<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Add Customer</title>
  </head>
  <body>
    <header>
      <h3>Signin</h3>
    </header>
    <section class="customer-section">
      <form class="new-customer-form" action="index.php">
        <fieldset class="customer-fieldset">
           <legend>New here:</legend>
           <input class="customer-data" type="text" name="email" value="Please enter email"><br>
           <input class="customer-data" type="text" name="password" value="Create password"><br>
           <input class="customer-data" type="text" name="password" value="Confirm password"><br>
        </fieldset>
        <fieldset class="customer-fieldset">
           <legend>Personal information:</legend>
           <input class="customer-data" type="text" name="firstname" value="Please enter name(s)"><br>
           <input class="customer-data" type="text" name="lastname" value="Please enter lastname(s)"><br>
           <input class="customer-data" type="text" name="phone" value="Please enter phonenumber"><br>
        </fieldset>
        <fieldset class="customer-fieldset">
          <legend>Shipping information:</legend>
           <input class="customer-data" type="text" name="adress" value="Please enter adress"><br>
           <input class="customer-data" type="text" name="city" value="Please enter city"><br>
           <input class="customer-data" type="text" name="postal code" value="Please enter postal code"><br>
           <input class="customer-data" type="text" name="country" value="Please enter country"><br>
        </fieldset>
        <fieldset class="customer-fieldset">
          <legend>Account preferences:</legend>
           <input class="customer-data" type="text" name="limite-credito" value="Please enter credit limit"><br>
        </fieldset>
        <input class="customer-submit" type="submit" value="Create Account">
      </form>
    </section>
  </body>
</html>
