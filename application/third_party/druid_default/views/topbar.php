{skyrep_start}
<script type="text/javascript" src="/{path}files/js/jquery.leanModal.min.js"></script>
<div class="bartop">
  <a name="myAnchor2" id="myAnchor2"></a><div class="containers">
    <div class="two columns">
      <a href="/"><img src="/{path}files/images/logo.png" alt="Family Indonesia - Value Your Family" border="0" /></a>
    </div>
    <div class="ten columns">
      {menu}
      <nav id="nav-wrap">
      <ul id="nav">
        {menu_tiny}
      </ul>
      </nav>
    </div>    

    <div class="four columns">
      <div class="pici">
        <div class="cari">
          <a href="#" class="show_hide looking">Search</a><br />
          <div class="slidingDiv">
            <form action="/search" method="GET" id="tw-form">    
              <input type="text" id="tw-input-texts" name="query" placeholder="search" /> 
              <input type="submit" id="tw-input-submit" value="" /> 
            </form>

          </div>
        </div>
        <?php
          if ($menu_login == true) {
            echo '
              <div class="userlogin">
                    	<a href="#" class="show_hides users" style="display: inline;">User Account</a><br>
                         <div class="slidingDivs" style="display: block; overflow: hidden;">
                         	<div class="divloginL">
                            <a href="/account" class="sett">Account Setting</a>
                            </div>
                            <div class="divloginR">
                            <a href="/logout" class="exit">Sign Out</a><br>
                            </div>
                         </div>
                    </div>
              ';  
          }
          else {
            echo '
        <div class="signiup">
          <a href="#" class="show_hides member">Membership</a><br />
          <div class="slidingDivs">
            <form class="form-2" method="POST" action="/login" style="margin-top:5px!important;margin-bottom:-10px!important">
              <p>
              <div class="well_username" id="error_username">
              <label for="email"><i class="icon-user"></i>Email</label>
              <input type="text" name="email" placeholder="Email" id="username">
              <div id="error_value_username"></div>
              </div>
              </p>

              <p>
              <div class="well_password" id="error_password">
              <label for="password"><i class="icon-lock"></i>Password</label>
              <input type="password" name="password" placeholder="Password" id="password">
              <div id="error_value_password"></div>
              </div>
              </p>
              <p class="clearfix"> </p>
              <!--<p class="float">
              <input name="" type="checkbox" value="">Remember me
              </p>
              -->
              <p class="float">
              Fill the form, we automatically know you login or sign up. 
              </p>  
              <p class="float">
              <a href="#" class="biasa">Forgot it?</a>
              </p>
              <p class="clearfix"> 
              <h1></h1>
              <!--<p class="float">
              If you are not registered yet, please<br> <a href="/register" class="biasa">Sign up</a> here 
              </p>  
              -->
              <input type="submit" name="submit" value="Log in" style="margin-top:10px;width:40%;" id="submit_login">
              <span style="font-size:50px;padding-left:10px;">
                <b>/</b>
              </span>
              <input type="submit" name="submit" value="Sign up" style="margin-top:10px;float:right;width:40%;" id="submit_sign_up">
              </p>
            </form>
          </div>
        </div>
              ';
          }
        ?>

      </div>
    </div>

    <div id="loading_1" style="display:none" >
      <div class="modal-backdrop fade in" ></div>
      <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header" style="">
          <h2 id="myModalLabel">Processing...</h2>
          <small>Wait in processing your request</small>
        </div>
        <div class="line-separator" style="margin-left:-20px;width:557px;"></div>
        <div class="modal-body">
          <p>
          <center><img src="/{path}files/images/ajax-loader.gif"> Loading ...</center>
          </p>
        </div>
      </div>
    </div>
    <div id="loading_2" style="display:none" >
      <div class="modal-backdrop fade in" ></div>
      <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header" style="">
          <h2 id="myModalLabel">Register Please</h2>
          <small>your Email Not registered.</small>
        </div>
        <div class="line-separator" style="margin-left:-20px;width:557px;"></div>
        <div class="modal-body">
          <p>
          Just Click the "<b>Yes, Finish</b>", and we send the confirmation link to your email.
          </p>
          <div class="line-separator" style="margin-left:-20px;width:557px;"></div>
          <form class="form-2" style="margin:0px;">
          <table border="0" style="width:570px;">
            <tr>
              <td><input type="submit" name="submit" class="submit_finish" value="Yes, Finish"></td>
              <td><input type="submit" name="submit" value="Cancel" class="submit_cancel" style="background:#fffaf6;"></td>
            </tr>
          </table>
        </form>
        </div>
      </div>
    </div>

    <div id="loading_3" style="display:none" >
      <div class="modal-backdrop fade in" ></div>
      <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header" style="">
          <h2 id="myModalLabel">Sent</h2>
          <small>We sent confirmation link to your Email</small>
        </div>
        <div class="line-separator" style="margin-left:-20px;width:557px;"></div>
        <div class="modal-body">
          <p>
          Please cheack your <b id="register_email"></b> <b>Inbox Mail</b> or <b>Spam Folder</b> in your Mail.
          </p>
          <div class="line-separator" style="margin-left:-20px;width:557px;"></div>
          <form class="form-2" style="margin:0px;">
          <table border="0" style="width:600px;">
            <tr>
              <td style="width:370px;"><input type="submit" name="submit" class="submit_cancel" value="Ok, Close" ></td>
              <td><input type="submit" name="submit" value="Resend Again" class="submit_resend" style="background:#fffaf6;" ></td>
            </tr>
          </table>
        </form>
        </div>
      </div>
    </div>

    <div id="loading_resend" style="display:none" >
      <div class="modal-backdrop fade in" ></div>
      <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header" style="">
          <h2 id="myModalLabel">Resend Confirmation</h2>
          <small>Resend Confirmation link to your Email</small>
        </div>
        <div class="line-separator" style="margin-left:-20px;width:557px;"></div>
        <div class="modal-body">
          <form class="form-2" style="margin:0px;">
          <table border="0" style="width:600px;">
            <tr>
              <td style="width:370px;"><input type="submit" name="submit" class="submit_resend_again" value="Yes, Resend" ></td>
              <td><input type="submit" name="submit" value="Close & Cancel" class="submit_cancel" style="background:#fffaf6;" ></td>
            </tr>
          </table>
        </form>
        </div>
      </div>
    </div>

    <div id="loading_error" style="display:none" >
      <div class="modal-backdrop fade in" ></div>
      <div id="myModal" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" >
        <div class="modal-header" style="">
          <h2 id="myModalLabel"><span id="error_response_head"></span></h2>
          <small><span id="error_response_desc"></span></small>
        </div>
        <div class="line-separator" style="margin-left:-20px;width:557px;"></div>
        <div class="modal-body">
          <p>
            <span id="error_response_value"></span>
          </p>
          <div class="line-separator" style="margin-left:-20px;width:557px;"></div>
          <form class="form-2" style="margin:0px;">
          <table border="0" style="width:600px;">
            <tr>
              <td style="width:370px;">&nbsp;</td>
              <td><input type="submit" name="submit" class="submit_cancel" value="Ok, Close" ></td>
            </tr>
          </table>
        </form>
        </div>
      </div>
    </div>

    <style type="text/css" media="screen">
      .info, .success, .warning, .error, .validation {
      border: 1px solid;
      margin: 10px 0px;
      padding:10px 5px 10px 10px;
      background-repeat: no-repeat;
      background-position: 10px center;
      }

      .error {
      color: #D8000C;
      background-color: #FFBABA;
      }

      .modal.fade.in {
        top: 10%;
      }
      .modal.fade {
        top: -25%;
        -webkit-transition: opacity 0.3s linear, top 0.3s ease-out;
        -moz-transition: opacity 0.3s linear, top 0.3s ease-out;
        -o-transition: opacity 0.3s linear, top 0.3s ease-out;
        transition: opacity 0.3s linear, top 0.3s ease-out;
      }
      .fade.in {
        opacity: 1;
      }
      .hide {
        display: none;
      }
      .modal {
        position: fixed;
        top: 10%;
        left: 50%;
        z-index: 1050;
        width: 560px;
        margin-left: -280px;
        background-color: #ffffff;
        border: 1px solid #999;
        border: 1px solid rgba(0, 0, 0, 0.3);
        -webkit-border-radius: 6px;
        -moz-border-radius: 6px;
        border-radius: 6px;
        outline: none;
        -webkit-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
        -moz-box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
        box-shadow: 0 3px 7px rgba(0, 0, 0, 0.3);
        -webkit-background-clip: padding-box;
        -moz-background-clip: padding-box;
        background-clip: padding-box;
        padding:20px;
        padding-top:5px;
        background: #fff url('/{path}files/images/subtle_freckles.png') repeat;
        font-family: 'lucida grande',tahoma,verdana,arial,sans-serif;
      }
      .fade {
        opacity: 0;
        -webkit-transition: opacity 0.15s linear;
        -moz-transition: opacity 0.15s linear;
        -o-transition: opacity 0.15s linear;
        transition: opacity 0.15s linear;
      }
      .modal-backdrop, .modal-backdrop.fade.in {
        opacity: 0.8;
        filter: alpha(opacity=80);
      }
      .modal-backdrop.fade {
        opacity: 0;
      }
      .fade.in {
        opacity: 1;
      }
      .modal-backdrop, .modal-backdrop.fade.in {
        opacity: 0.8;
        filter: alpha(opacity=80);
      }
      .modal-backdrop {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: 1040;
        background-color: #000000;
      }
    </style>


    <script type="text/javascript" charset="utf-8">
      $(function(){

          function submit_cancel()
          {
          $('.submit_cancel').click(function(event){
            event.preventDefault();
            $('#loading_2').hide();
            $('#loading_3').hide();
            $('#loading_error').hide();
            $('#loading_resend').hide();
            });
          }
          submit_cancel();

          $('.submit_resend_again').click(function(event){
            event.preventDefault();
            $('#loading_resend').hide();
            $('#loading_1').show();
            val_m = $('#username').val();
            val_p = $('#password').val();
            
            $.ajax({
              type:'POST',
              url:'/register/ajax/reg_resend',
              data:{type : 'reg_resend', m : val_m, p : val_p},
              success:
              function(data)
              { 
                $('#loading_1').hide();
                $('#loading_resend').show();
                submit_cancel();
              }
              });

            });

          $('.submit_resend').click(function(event){
            event.preventDefault();
            $('#loading_3').hide();
            $('#loading_1').show();
            $('#loading_1').hide();
            $('#loading_resend').show();
            });

          $('.submit_finish').click(function(event){
            event.preventDefault();
            $('#loading_2').hide();
            $('#loading_1').show();
            val_m = $('#username').val();
            val_p = $('#password').val();

            // send the regsitration
            $.ajax({
              type:'POST',
                url:'/register/ajax/reg_user',
                data:{type : 'reg_user', m : val_m, p : val_p},
                success:
                function(data)
                {
                  d = $.parseJSON(data);
                  if  (d.type == 'error')
                  {

                    $('#loading_1').hide();
                    $('#error_response_head').html(d.type);
                    $('#error_response_desc').html('error code : ' + d.code);
                    $('#error_response_value').html('error description : '+ d.value);
                    $('#loading_error').show();
                  }
                  else {
                    $('#loading_1').hide();
                    $('#loading_3').show();
                    $('#register_email').html(val_m);                   
                  }

                }
            });

            });

          function validateEmail(sEmail) {
          var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
          if (filter.test(sEmail)) {
          return true;
          }
          else {
          return false;
          }
          }


          function check_it()
          {
          username = $('#username').val();
          password = $('#password').val();

          var u_dat = 0;
          var p_dat = 0;

            if  (username == '')
            {
              $('.well_username').addClass('error'); 
              $('#error_value_username').html('must not empty');
              u_dat = 0;
            }
            else  
            {
              if  (validateEmail(username) == false)
              {
                $('.well_username').addClass('error'); 
                $('#error_value_username').html('Its Wrong Email Format');
              u_dat = 0;
              }
              else  
              {
                $('.well_username').removeClass('error'); 
                $('#error_value_username').html('');
                u_dat = 1;
              }
            }

            if  (password == '')
            {
              $('.well_password').addClass('error'); 
              $('#error_value_password').html('must not empty');
              p_dat = 0;
            }
            else
            {
              if  (password.length < 3)
              {
                $('.well_password').addClass('error'); 
                $('#error_value_password').html('Et least 3 Character please');
              p_dat = 0;
              
              }
              else  
              {
                $('.well_password').removeClass('error'); 
                $('#error_value_password').html('');
              p_dat = 1;
              }
            }

            if  (u_dat == 1 && p_dat == 1)
            {
              $('#loading_1').show();
              //  here ajax to validate user
              //  if not exists below code

              username = encodeURIComponent($('#username').val());
              password = encodeURIComponent($('#password').val());
              $.ajax({
                    type:'POST',
                    url:'/register/ajax/valid_user',
                    data:{type : 'user', m : username, p : password},
                    success:
                    function(data)
                    {
                    submit_cancel();
                      d = $.parseJSON(data);
                      if  (d.type == 'error')
                      {
                        $('#loading_1').hide();
                        $('#error_response_head').html(d.type);
                        $('#error_response_desc').html('error code : ' + d.code);
                        $('#error_response_value').html('error description : '+ d.value);
                        $('#loading_error').show();
                      }
                      else if (d.type == 'warning')
                      {
                        $('#loading_1').hide();
                        $('#loading_2').show();
                      }
                      else
                      {
                        if  (d.code == '201')
                        {
                          top.location='/admin';
                        }
                        else if (d.code == '202') {
                          top.location='/Onlineseller';
                        }
                        else if (d.code == '203') {
                          top.location='/regpersonal';
                        }
                        else if (d.code == '204') {
                          top.location='/Onlineseller';
                        }
                        else if (d.code == '205') {
                          top.location='/regkasir';
                        }
                        else if (d.code == '206') {
                          top.location='/regsales';
                        }
                        else if (d.code == '207') {
                          top.location='/reggudang';
                        }
                        else
                        {
                          document.location.reload();
                        }
                      }
                    }
                });



            }
          }

          $('#submit_login').click(function(e){
              e.preventDefault();
              check_it(); 
              });

          $('#submit_sign_up').click(function(e){
              e.preventDefault();
              check_it(); 
              });

          $('#username, #password').keyup(function(event){
              event.preventDefault();
              if (event.keyCode == 13)
              {
              check_it();
              }
            }); 
      });
    </script>

    <script type="text/javascript">

      $(function(){
          $(".slidingDiv").hide();
          $(".show_hide").show();
          $('.show_hide').click(function(){
            $(".slidingDivs").hide();
            $(".slidingDiv").slideToggle();
            });

          $(".slidingDivs").hide();
          $(".show_hides").show();
          $('.show_hides').click(function(){
            $(".slidingDiv").hide();
            $(".slidingDivs").slideToggle();
            });

          });

        </script>

      </div>
    </div> 
    {skyrep_end}
