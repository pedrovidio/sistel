<div id="body">
  <div id="login">
    <center>
    <img src="<?php echo base_url('assets/img/logo.png')?>" alt="logo opiniao" width="150" >
    </center>
    <h1>LOGIN</h1>
    <form method="post" action="<?php echo base_url('login/validate')?>">
      <input type="text" name="user" required placeholder="Digite seu usuário">
      <input type="password" name="password" required placeholder="Digite a sua senha">
      <input type="submit" value="Login" id="bt-login">
      <?php if($msg){echo "<div id='msg'>".$msg."</div>";}?>
    </form>
</div>
</div>