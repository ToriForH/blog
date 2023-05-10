<?php

  session_start();
  require('connect.php');

  function dd($value) // to be deleted
  {
    echo "<pre>", print_r($value, true), "</pre>";
    die();
  }


  function executeQuery($sql, $data) {
      global $conn;
      $stmt= $conn->prepare($sql);
      $values = array_values($data);
      $types = str_repeat('s', count($values));
      $stmt->bind_param($types, ...$values);
      $stmt->execute();
      return $stmt;
  }


  function selectAll($table, $condition = [])
  {
      global $conn;
      $sql = "SELECT * FROM $table";
      if (empty($condition)) {
          $stmt = $conn->prepare($sql);
          $stmt->execute();
          $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
          return $records;
      } else {
          $i = 0;
          foreach ($condition as $key => $value) {
              if ($i == 0) {
                  $sql = $sql . " WHERE $key=?";
              } else {
                  $sql = $sql . " AND $key=?";
              }
              $i++;
          }
          $stmt = executeQuery($sql, $condition);
          $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
          return $records;
      }
  }


  function selectOne($table, $condition)
  {
      global $conn;
      $sql = "SELECT * FROM $table";
      $i = 0;
      foreach ($condition as $key => $value) {
          if ($i == 0) {
              $sql = $sql . " WHERE $key=?";
          } else {
              $sql = $sql . " AND $key=?";
          }
          $i++;
      }

      $sql = $sql . " LIMIT 1";
      $stmt = executeQuery($sql, $condition);
      $records = $stmt->get_result()->fetch_assoc();
      return $records;
  }


  function create($table, $data)
  {
      global $conn;
      $sql = "INSERT INTO $table SET ";
      $i = 0;
      foreach ($data as $key => $value) {
          if ($i == 0) {
              $sql = $sql . " $key=?";
          } else {
              $sql = $sql . ", $key=?";
          }
          $i++;
      }

      $stmt = executeQuery($sql, $data);
      $id = $stmt->insert_id;
      return $id;
  }


    function update($table, $id, $data)
    {
        global $conn;
        $sql = "UPDATE $table SET ";
        $i = 0;
        foreach ($data as $key => $value) {
            if ($i == 0) {
                $sql = $sql . " $key=?";
            } else {
                $sql = $sql . ", $key=?";
            }
            $i++;
        }

        $sql = $sql . " WHERE id=?";
        $data['id'] = $id;
        $stmt = executeQuery($sql, $data);
        return $stmt->affected_rows;
    }

    function delete($table, $id)
    {
        global $conn;
        $sql = "DELETE FROM $table WHERE id=?";
        $stmt = executeQuery($sql, ['id' => $id]);
        return $stmt->affected_rows;
    }

    function getValue($table, $record_id, $value)
    {
        global $conn;
        $record = selectOne($table, ['id' => $record_id]);
        return $record[$value];
    }

function searchPost($term)
{
    global $conn;
    $match = '%' . $term . '%';
    $sql = "SELECT * FROM posts WHERE published=? AND title LIKE ? OR body LIKE ? ORDER BY created_at DESC";
    $stmt = executeQuery($sql, ['published' => 1, 'title' => $match, 'body' => $match]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function publishedCondition($table, $condition = [])
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE published=1";
    if (empty($condition)) {
        $sql = $sql . " ORDER BY created_at DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } else {
        foreach ($condition as $key => $value) {
            $sql = $sql . " AND $key=?";
        }
        $sql = $sql . " ORDER BY created_at DESC";
        $stmt = executeQuery($sql, $condition);
    }
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $records;
}

function paginatePublished($currentPage = 1, $recordsPerPage = 2)
{
    global $conn;
    $sql = "SELECT * FROM posts WHERE published=1 ORDER BY created_at DESC LIMIT ?,?";
    $data = [
        'offset' => ($currentPage - 1) * $recordsPerPage,
        'numberOfRecords' => $recordsPerPage
    ];
    $stmt = executeQuery($sql, $data);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return [
        'posts' => $records,
        'nextPage' => count($records) < $recordsPerPage ? false : $currentPage + 1
    ];
}