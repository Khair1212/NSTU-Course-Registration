<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <title>To-Do List</title>
    <link rel="stylesheet" href="todo.css">
    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

<style>
  body{background-color: green;}
</style>


  </head>
  <body>

    
<?php
          // include_once("education_nav.php");
          ?> 

    <div class="center">
      <div class="button">
        <span class="text">To-Do List</span>
        <span class="icon"><i class="fas fa-sort-down"></i></span>
      </div>
<div class="field">
        <input type="text" required placeholder="Add your new to-do list">
        <span class="add-btn">ADD</span>
      </div>
<ul>
<li><span><i class="fa fa-trash"></i></span>Email To Education Branch</li>
<li><span><i class="fa fa-trash"></i></span>Notice for Students 3rd Year</li>
<li><span><i class="fa fa-trash"></i></span>Meeting with Teacher Panel</li>
<li><span><i class="fa fa-trash"></i></span></li>
<li><span><i class="fa fa-trash"></i></span></li>
</ul>
</div>
<script>
      $('.add-btn').click(function(){
        $('ul').append("<li><span><i class='fa fa-trash'></i></span>"+ $('input').val() +"</li>");
         $('input').val("");
      });
      $('ul').on("click", 'span', function(){
        $(this).parent().fadeOut(500,function(){
          $(this).remove();
        });
      });
      $('.icon').click(function(){
        $('.field').toggleClass("hide");
      })
    </script>




<!-- 
    <footer>
        <link rel="stylesheet" href="footer.css">
          <div class="main-content">
            <div class="left box">
              <h2>About us</h2>
              <div class="content">
                <p>Online Course Registration of NSTU is a smart and digital way to form fill-up, pay credit fees and course fees for all semester and also students can apply for backlog application and don't have to go office tangible for any of these.</p>
                <div class="social">
                  <a href="#"><span class="fab fa-facebook-f"></span></a>
                  <a href="#"><span class="fab fa-twitter"></span></a>
                  <a href="#"><span class="fab fa-instagram"></span></a>
                  <a href="#"><span class="fab fa-youtube"></span></a>
                </div>
              </div>
            </div>
    
            <div class="right box">
              <h2>Contact us</h2>
              <div class="content">
                <form action="#">
                  <div class="email">
                    <div class="text">Email *</div>
                    <input type="email" required>
                  </div>
                  <div class="msg">
                    <div class="text">Feedback *</div>
                     <textarea rows="2" cols="25" required></textarea>
                  </div>
                  <div class="btn">
                    <button type="submit">Send</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </footer> -->


  </body>
</html>
