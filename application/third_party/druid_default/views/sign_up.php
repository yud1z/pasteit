<script type="text/javascript" src="/files/js/str_replace.js"></script>
<script type="text/javascript" src="/register/ajax/place"></script>
<div class="container" style="margin-top:0px; ">
  <div class="clear"></div>

  <div class="eight columns signintext">
    <img src="/{path}files/images/fami.png" alt="">
    <h1>SIGN UP!</h1>
      Melalui prosedur SIGN UP maka Anda secara otomatis menjadi member website kami. Selamat datang<img style="width:15px" src="/{path}files/images/smile.png">
    <br>
    <br>
    <table width="90%" border="0" >
      <tbody><tr>
          <td>Dengan menjadi member website, Anda tidak perlu lagi memasukkan info kontak personal, saat pembelian produk di lain waktu. Prosedur pembelian menjadi lebih cepat.<br><br></td>
        </tr>
        <tr>
          <td>Akan ada rangkaian <i>special offer</i> menarik sebagai apresiasi Member Relationship Program www.vamily.co.id . Dan kami menjaga kerahasiaan info kontak personal Anda. Nantikan kejutan manis dan nilai-nilai positif yang segera Caitra hadirkan untuk Anda.</td>
        </tr>
    </tbody></table>

<br>
<i>We share the same values, let’s share positivity!</i>
<br>
<br>
Salam hangat,
<br>
Caitra - Value for your Family 

  </div>

  <div class="eight columns">
    <form class="form-2" method="POST" action="/register">
      <div class="signlog">
        <img src="/{path}files/images/signup.png" alt="">
      </div>
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


      <label for="Gender">Gender(<font style="color:red">*</font>)</label>
      <select name="Gender">
        <option value="1">Female</option>
        <option value="2">Male</option>
      </select>


     <style type="text/css" media="screen">
       .date_pendek{
        width:140px;
       }
     </style>

      <label for="tanggal">Birthdate (DD/MM/YY)(<font style="color:red">*</font>)</label>
      <table>
        <tr>
          <td>
              <select name="tanggal" class="date_pendek">
                <option value="1">01</option>
                <option value="2">02</option>
                <option value="3">03</option>
                <option value="4">04</option>
                <option value="5">05</option>
                <option value="6">06</option>
                <option value="7">07</option>
                <option value="8">08</option>
                <option value="9">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
          </td>
          <td>
              <select name="bulan" class="date_pendek">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
          </td>
          <td>
            <select name="tahun" class="date_pendek">
              <option value="1940">1940</option>
              <option value="1941">1941</option>
              <option value="1942">1942</option>
              <option value="1943">1943</option>
              <option value="1944">1944</option>
              <option value="1945">1945</option>
              <option value="1946">1946</option>
              <option value="1947">1947</option>
              <option value="1948">1948</option>
              <option value="1949">1949</option>
              <option value="1950">1950</option>
              <option value="1951">1951</option>
              <option value="1952">1952</option>
              <option value="1953">1953</option>
              <option value="1954">1954</option>
              <option value="1955">1955</option>
              <option value="1956">1956</option>
              <option value="1957">1957</option>
              <option value="1958">1958</option>
              <option value="1959">1959</option>
              <option value="1960">1960</option>
              <option value="1961">1961</option>
              <option value="1962">1962</option>
              <option value="1963">1963</option>
              <option value="1964">1964</option>
              <option value="1965">1965</option>
              <option value="1966">1966</option>
              <option value="1967">1967</option>
              <option value="1968">1968</option>
              <option value="1969">1969</option>
              <option value="1970">1970</option>
              <option value="1971">1971</option>
              <option value="1972">1972</option>
              <option value="1973">1973</option>
              <option value="1974">1974</option>
              <option value="1975">1975</option>
              <option value="1976">1976</option>
              <option value="1977">1977</option>
              <option value="1978">1978</option>
              <option value="1979">1979</option>
              <option value="1980">1980</option>
              <option value="1981">1981</option>
              <option value="1982">1982</option>
              <option value="1983">1983</option>
              <option value="1984">1984</option>
              <option value="1985">1985</option>
              <option value="1986">1986</option>
              <option value="1987">1987</option>
              <option value="1988">1988</option>
              <option value="1989">1989</option>
              <option value="1990">1990</option>
              <option value="1991">1991</option>
              <option value="1992">1992</option>
              <option value="1993">1993</option>
              <option value="1994">1994</option>
              <option value="1995">1995</option>
            </select>
          </td>
        </tr>
      </table>
      <br><br>
      <label for="alamat"><i class="icon-pushpin"></i>Postal Address(<font style="color:red">*</font>)</label>
      <textarea type="text" name="alamat" placeholder="Address" style="width:410px;height:75px;"></textarea>

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
      <label for="zip">Postal Code(<font style="color:red">*</font>)</label>
      <input type="text" name="zip" placeholder="Zip Postal Code">

      </p>
      <p class="float">
      <label for="phone"><i class="icon-phone"></i>Phone Number</label>
      <input type="text" name="mobile" placeholder="Mobile Number">(<font style="color:red">*</font>)
      <input type="text" name="Phone" placeholder="Phone Number">

      <br>
      <label for="email"><i class="icon-envelope-alt"></i>Email Address(<font style="color:red">*</font>)</label>
      <input type="text" name="email" placeholder="Email">
      <input type="text" name="vemail" placeholder="Verify Email">
      <br>
      <label for="password"><i class="icon-lock"></i>Password(<font style="color:red">*</font>)</label>
      <input type="password" name="password" placeholder="Expected Password">
      <input type="password" name="vassword" placeholder="Verify password">
      <br>
      </p><div class="captc float" style="min-height:50px;min-width:40px;">
      {captcha}
    </div>
    <div class="float">
      <label for="captcha"><i class="icon-barcode"></i>Enter Text Above(<font style="color:red">*</font>)</label>
      <input type="text" name="captcha" placeholder="Enter Captcha">
      <label for="refresh"><i class="icon-repeat"></i><a id="refresh_captcha" href="javascript:void(0)">Refresh Code</a></label>
    </div>
      <br>
      Mailing List  <input type="checkbox"  name="milist" placeholder="Expected Password">
      <br>
      Newsletter  <input type="checkbox"  name="newsletter" placeholder="Expected Password">
    <p></p>

    <p>
      if you see (<font style="color:red">*</font>), it means Required
    </p>

    <small>
      For further assistance/anything about sign up please email to <a href="mailto:vamily@vamily.co.id">vamily@vamily.co.id</a>
    </small>

    <p class="float">

    </p><p class="clearfix"> 
    </p><h1></h1>

    <input type="submit" name="signup" value="Sign up">
    <p></p>
  </form>
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

      $('[name="alamat"]').keyup(function(){
          show_load();
          fetch_valid('alamat', this.value);
        }); 

      $('[name="district"]').keyup(function(){
          show_load();
          fetch_valid('district', this.value);
        }); 


      $('[name="zip"]').keyup(function(){
          show_load();
          fetch_valid('zip', this.value);
        }); 


      $('[name="mobile"]').keyup(function(){
          show_load();
          fetch_valid('mobile', this.value);
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
          var valid1 = new fetch_valid('alamat', $('[name="alamat"]').val());
          var valid1 = new fetch_valid('district', $('[name="district"]').val());
          var valid1 = new fetch_valid('zip', $('[name="zip"]').val());
          var valid1 = new fetch_valid('mobile', $('[name="mobile"]').val());
          var valid1 = new fetch_valid('email', $('[name="email"]').val(), $('[name="vemail"]').val());
          var valid1 = new fetch_valid('vemail', $('[name="vemail"]').val(), $('[name="email"]').val());
          var valid1 = new fetch_valid('password', $('[name="password"]').val(), $('[name="vassword"]').val());
          var valid1 = new fetch_valid('vassword', $('[name="vassword"]').val(), $('[name="password"]').val());
          var valid1 = new fetch_valid('captcha', $('[name="captcha"]').val());

          
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
