<script type="text/javascript" src="/files/js/str_replace.js"></script>
<script type="text/javascript" src="/register/ajax/place"></script>
<div class="container" style="margin-top:0px; ">
  <div class="clear"></div>


  <div class="eight columns">

    <fieldset id="Register">
      <legend>Register</legend>

      <form class="form-2" method="POST" action="/register">
        <div id="" style="height:30px;">

          <div id="loading" style="margin-bottom:20px;display:none">
            <center>
              <img src="/{path}files/images/ajax-loader.gif"> Loading ...
            </center>
          </div>
        </div>
        <div id="wedew" style="display:none">
          0
        </div>
        <div class="errorbox" id="the_error" style="display:none">
        </div>
        {error}
        <div class="suksesbox" id="suksesbox" style="display:none">
          Correct
        </div>
        <p class="float">


        <label for="username"><i class="icon-user"></i>Username(<font style="color:red">*</font>)</label>
        <input type="text" name="username" placeholder="Username" value="" class="error">


        <label for="login"><i class="icon-user"></i>Fullname(<font style="color:red">*</font>)</label>
        <input type="text" name="fullname" placeholder="Full Name" value="" class="error">


        <br><br>

        <label for="province">Province(<font style="color:red">*</font>)</label>
        <select name="province" id="province">
          <option id="null_province" value="-1">---</option>
        </select>
        <br>
        <label for="state">City(<font style="color:red">*</font>)</label><!--Kota-->
        <select name="state" id="state">
          <option id="null_state" value="-1">---</option>
        </select>
        <br>
        <label for="district">District(<font style="color:red">*</font>)</label><!--Kecamatan-->
        <select name="district" id="district">
          <option id="null_district" value="-1">---</option>

        </select>

        <br>
        <label for="email"><i class="icon-envelope-alt"></i>Email Address(<font style="color:red">*</font>)</label>
        <input type="text" name="email" placeholder="Email">
        <input type="text" name="vemail" placeholder="Verify Email">
        <br>
        <label for="password"><i class="icon-lock"></i>Password(<font style="color:red">*</font>)</label>
        <input type="password" name="password" placeholder="Expected Password">
        <input type="password" name="vassword" placeholder="Verify password">
        <br>
        <p>
        if you see (<font style="color:red">*</font>), it means Required
        </p>


        <p class="float">

        </p><p class="clearfix"> 
        </p><h1></h1>

        <input type="submit" name="signup" value="Sign up" class="button">
        <p></p>
      </form>

    </fieldset>
  </div>

</div>


<script type="text/javascript" charset="utf-8">
$(function(){

    var a;

    function show_load(){$('#loading').show();}

    function fetch_valid(arg, val, val2)
    {
    $.ajax({
type:'POST',
url:'/register/ajax/valid',
data:{type : arg, value : val, value1 : val2},
success:
function(data)
{
if (data == '')
{
$('#the_error').hide();
$('#the_error_'+ arg).hide();
$('#loading').hide();
$('#suksesbox').show();
$('#wedew').html('0');
}
else
{
$('#the_error').show();
$('#the_error_'+ arg).remove();
$('#wedew').after('<div class="errorbox" id="the_error_'+ arg +'">' + data + '</div>');
$('#loading').hide();
$('#suksesbox').hide();
$('#wedew').html('1');
}

}
});

}



$('[name="username"]').keyup(function(){
    show_load();
    fetch_valid('username', this.value);
    }); 

$('[name="fullname"]').keyup(function(){
    show_load();
    fetch_valid('fullname', this.value);
    }); 

$('[name="email"]').keyup(function(){
    show_load();
    fetch_valid('email', this.value, $('[name="vemail"]').val());
    }); 


$('[name="vemail"]').keyup(function(){
    show_load();
    fetch_valid('vemail', this.value, $('[name="email"]').val());
    }); 


$('[name="password"]').keyup(function(){
    show_load();
    fetch_valid('password', this.value, $('[name="vassword"]').val());
    }); 


$('[name="vassword"]').keyup(function(){
    show_load();
    fetch_valid('vassword', this.value, $('[name="password"]').val());
    }); 


$('[name="captcha"]').keyup(function(){
    show_load();
    fetch_valid('captcha', this.value);
    }); 

$('[name="signup"]').click(function(e){
    e.preventDefault();
    show_load();

    //  Valid here
    // wrong
    //fetch_valid('signup', this.value);

    //if right goes here

    var valid1 = new fetch_valid('username', $('[name="username"]').val());
    var valid1 = new fetch_valid('fullname', $('[name="fullname"]').val());
    var valid1 = new fetch_valid('district', $('[name="district"]').val());
    var valid1 = new fetch_valid('email', $('[name="email"]').val(), $('[name="vemail"]').val());
    var valid1 = new fetch_valid('vemail', $('[name="vemail"]').val(), $('[name="email"]').val());
    var valid1 = new fetch_valid('password', $('[name="password"]').val(), $('[name="vassword"]').val());
    var valid1 = new fetch_valid('vassword', $('[name="vassword"]').val(), $('[name="password"]').val());


    var we = $('#wedew').html();

    switch(we)
    {
      case '0' : 
        //$('[name="signup"]').attr('onclick', '');
        $('.form-2').submit();
        break;
      case '1':
        break;
    }



}); 


});
</script>

<script type="text/javascript" charset="utf-8">
$(function(){
    $('#refresh_captcha').click(function(){
      $.ajax({
type:'POST',
url:'/register/ajax/captcha',
success:
function(data)
{
$('.captc').html(data);
}
});

      });
    });
</script>


<script type="text/javascript" charset="utf-8">
$(function(){
    $.each(place, function(i, obj) {
      $('#null_province').after('<option id="null_province" value="'+ i +'">' +
        i.toUpperCase().replace('_', ' ').replace('__', ' ') +
        '</option>');
      });

    $('#province').change(function(){
      eval('var w = place.' + $(this).val()); 
      $('#null_state').nextAll().remove();
      $.each(w, function(i, obj) {
        $('#null_state').after('<option id="null_state" value="'+ i +'">' +
          str_replace('_', ' ', i.toUpperCase())+
          '</option>');
        });
      });

    $('#state').change(function(){
      var prov = $('#province').find(":selected").val();
      eval('var w = place.'+ prov + '.' + $(this).val()); 

      $('#null_district').nextAll().remove();

      $.each(w, function(i, obj) {
        $('#null_district').after('<option id="null_state" value="'+ obj +'">' +
          str_replace('_', ' ', i.toUpperCase())+
          '</option>');
        });
      });
});
</script>
