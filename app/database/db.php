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
        if($table == 'posts') {
            $ex = deleteOldTopics($id);
        }
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

    function getIdByName($table, $name)
    {
        global $conn;
        $record = selectOne($table, ['name' => $name]);
        return $record['id'];
    }

function publishedCondition($table, $condition = [])
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE published=1";
    if (empty($condition)) {
        $sql = $sql . " ORDER BY created_at DESC";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    } else {
        foreach ($condition as $key => $value) {
            $sql = $sql . " AND $key=?";
        }
        $sql = $sql . " ORDER BY created_at DESC";
        $stmt = executeQuery($sql, $condition);
        $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $records;
    }
}

function paginatePublished($recordsNumber, $currentPage = 1, $recordsPerPage = 10)
{
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    global $conn;
    $sql = "SELECT * FROM posts WHERE published=1 ORDER BY created_at DESC LIMIT ?,?";
    $data = [
        'offset' => ($currentPage - 1) * $recordsPerPage,
        'numberOfRecords' => $recordsPerPage
    ];
    $stmt = executeQuery($sql, $data);
    $numberOfPages = ceil( $recordsNumber / $recordsPerPage);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return [
        'posts' => $records,
        'prevPage' => $currentPage > 1 ? $currentPage - 1 : false,
        'nextPage' => $currentPage + 1 <= $numberOfPages ? $currentPage + 1 : false,
        'pages' => $numberOfPages
    ];
}

function searchPost($term, $recordsNumber, $currentPage = 1, $recordsPerPage = 10)
{
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    global $conn;
    $matchTitle = '%' . $term . '%';
    $matchBody = '&lt;p&gt;' . '%' . $term . '%' . '&lt;/p&gt;';
    $sql = "SELECT * FROM posts WHERE published=1 AND title LIKE ? OR body LIKE ? ORDER BY created_at DESC LIMIT ?,?";
    $stmt = executeQuery($sql, ['title' => $matchTitle, 'body' => $matchBody, 'offset' => ($currentPage - 1) * $recordsPerPage, 'numberOfRecords' => $recordsPerPage]);
    $records = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $numberOfPages = ceil( $recordsNumber / $recordsPerPage);
    return [
        'posts' => $records,
        'prevPage' => $currentPage > 1 ? $currentPage - 1 : false,
        'nextPage' => $currentPage + 1 <= $numberOfPages ? $currentPage + 1 : false,
        'pages' => $numberOfPages
    ];
}

function searchTopic($topic, $recordsNumber, $currentPage = 1, $recordsPerPage = 10)
{
    $currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
    global $conn;
    $post_ids = topicPostIds($topic);
    $records = array();
    $offset = 0;
    foreach($post_ids as $id) {  // or as $key => $id
        $sql = "SELECT * FROM posts WHERE published=1 AND id=?";
        $stmt = executeQuery($sql, ['id' => $id]);
        $post = $stmt->get_result()->fetch_assoc();
        array_push($records, $post);
        $offset++;
        if($offset == $recordsPerPage) {
            break;
        }
    }
    $records = array_filter($records);
    $records = array_reverse($records);
    $numberOfPages = ceil( $recordsNumber / $recordsPerPage);
    return [
        'posts' => $records,
        'prevPage' => $currentPage > 1 ? $currentPage - 1 : false,
        'nextPage' => $currentPage + 1 <= $numberOfPages ? $currentPage + 1 : false,
        'pages' => $numberOfPages
    ];
}

function countRecords($table, $condition = [])
{
    global $conn;
    $sql = "SELECT COUNT(*) as total FROM $table WHERE published=1";
    if (empty($condition)) {
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    } else {
        foreach ($condition as $key => $value) {
            $sql = $sql . " AND $key=?";
        }
        $stmt = executeQuery($sql, $condition);
    }
    $number = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $number[0];
}

function countSearch($term)
{
    global $conn;
    $matchTitle = '%' . $term . '%';
    $matchBody = '&lt;p&gt;' . '%' . $term . '%' . '&lt;/p&gt;';
    $sql = "SELECT COUNT(*) as total FROM posts WHERE published=1 AND title LIKE ? OR body LIKE ?";
    $stmt = executeQuery($sql, ['title' => $matchTitle, 'body' => $matchBody]);
    $number = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    return $number[0];
}

function countTopicPosts($topic)
{
    global $conn;
    $post_ids = topicPostIds($topic);
    $number = count($post_ids);
    return $number;
}

function postTopics($post_id)
{
    global $conn;
    $sql = "SELECT topic_id FROM post_topics WHERE post_id=?";
    $stmt = executeQuery($sql, ['post_id' => $post_id]);
    $topics_array = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $result = array();
    foreach ($topics_array as $key => $value) {
        foreach ($value as $k => $v) {
            array_push($result, $v);
        }
    }
    return $result;
}

function topicPostIds($topic_id)
{
    global $conn;
    $sql = "SELECT post_id FROM post_topics WHERE topic_id=?";
    $stmt = executeQuery($sql, ['topic_id' => $topic_id]);
    $topics_array = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $result = array();
    foreach ($topics_array as $key => $value) {
        foreach ($value as $k => $v) {
            array_push($result, $v);
        }
    }
    return $result;
}

function getPostTopicIds($post_id)
{
    global $conn;
    $sql = "SELECT topic_id FROM post_topics WHERE post_id=?";
    $stmt = executeQuery($sql, ['post_id' => $post_id]);
    $topics_array = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $result = array();
    foreach ($topics_array as $key => $value) {
        foreach ($value as $k => $v) {
            array_push($result, $v);
        }
    }
    return $result;
}

function setPostTopics($post_id, $topics)
{
    global $conn;
    $deleted = deleteOldTopics($post_id);
    $result = 0;
    foreach ($topics as $key => $topic) {
        $sql = "INSERT INTO post_topics SET post_id=?, topic_id=?";
        $stmt = executeQuery($sql, ['post_id' => $post_id, 'topic_id' => $topic]);
        $result = $result + ($stmt->insert_id);
    }
    return $result;
}

function deleteOldTopics($post_id)
{
    global $conn;
    $sql = "DELETE FROM post_topics WHERE post_id=?";
    $stmt = executeQuery($sql, ['post_id' => $post_id]);
    $ex = $stmt->affected_rows;
    return $ex;
}

function userIdsByRole($role_id) 
{
    global $conn;
    $sql = "SELECT id FROM users WHERE role=?";
    $stmt = executeQuery($sql, ['role' => $role_id]);
    $users_array = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $result = array();
    foreach ($users_array as $key => $value) {
        foreach ($value as $k => $v) {
            array_push($result, $v);
        }
    }
    return $result;
}