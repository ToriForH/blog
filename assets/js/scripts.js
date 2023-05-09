$(document).ready(function() {
  $('.menu-toggle').on('click', function() {
    $('.nav').toggleClass('showing');
  });

  $('.post-wrapper').slick({
    infinite: true,
    slidesToShow: 3,
    slidesToScroll: 1,
    nextArrow: $('.next'),
    prevArrow: $('.prev'),
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        }
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
    ]
  });
});

$(document).ready(function() {
  $('.username').on('click', function() {
    $('.us').toggleClass('showing');
    $('.username').toggleClass('showing');
  });
});

ClassicEditor.create(document.querySelector("#body"), {
  toolbar: [
  "heading",
  "|",
  "bold",
  "italic",
  "link",
  "bulletedList",
  "numberedList",
  "blockQuote"
  ],
  heading: {
  options: [
  {model: "paragraph", title: "Paragraph", class: "ck-heading_paragraph" },
  {
    model: "heading1",
    view: "h1",
    title: "Heading 1",
    class: "ck-heading_heading1"
  },
  {
    model: "heading2",
    view: "h2",
    title: "Heading 2",
    class: "ck-heading_heading2"
  }
  ]
  }
}).catch(error => {
  console.log( error );
});


