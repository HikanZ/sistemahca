$(document).ready(function () {

/* --------------------------------- */
  $('[data-pwmatch]').keyup(function() {

    if(!$('[data-pwmatch="NewPW"]').attr("data-pwmatch-length")) { var pwlength = '5'; }
    else { var pwlength = $('[data-pwmatch="NewPW"]').attr("data-pwmatch-length"); }



    if($('[data-pwmatch="NewPW"]').val().length > pwlength-1 && $('[data-pwmatch="NewPW"]').val() == $('[data-pwmatch="ConfirmPW"]').val()){
      $('[data-pwmatch="submit"]').attr('disabled', false);
      $('#PasswordMatch').text('As novas senhas conferem');
      $('#PasswordMatch').css('color','#4db8ff');
      $('#PasswordMatch').css('font-weight','50');
    } else {
      $('[data-pwmatch="submit"]').attr('disabled', true);
      $('#PasswordMatch').text('As novas senhas são diferentes');
      $('#PasswordMatch').css('color','red');
      $('#PasswordMatch').css('font-weight','50');
    }
      var MatchPW = $('#PasswordMatch').val();

  });

/* ------------------------------------------------------ */
});
