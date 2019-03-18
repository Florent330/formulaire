<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Formulaire</title>
</head>
<body>

<form  action="form.php"  method="post">
    <div>
        <label  for="name">Name :</label>
        <input  type="text" id="name"  name="name" required value="<?php if (isset($_POST['name'])) {echo $_POST['name'];} ?> " >
    </div>
    <p><?php  if(isset($errors['name1'])) { echo $errors['name1'];} ?></p>
    <div>
        <label  for="firstName">First name :</label>
        <input  type="text" id="firstName"  name="firstName" pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,20}$" value="<?php if (isset($_POST['firstName'])) { echo $_POST['firstName']; } ?> "  >
    </div>
    <p><?php  if(isset($errors['firstName1'])) { echo $errors['firstName1']; }?></p>

    <label  for="email">Courriel :</label>
    <input  type="email"  id="email"  name="email" required value="<?php if (isset($_POST['email'])) { echo $_POST['email']; } ?> "  >
    <p><?php  if(isset($errors['email1'])) { echo $errors['email1']; } ?></p>
    <p><?php  if(isset($goodInput['email'])) { echo $goodInput['email']; } ?></p>
    <div>
        <label  for="phone">Phone :</label>
        <input type="tel" name="phone" id="phone" required value="<?php if (isset($_POST['phone'])) { echo $_POST['phone']; } ?> ">
    </div>
    <p><?php  if(isset($errors['phone1'])) { echo $errors['phone1']; } ?></p>
    <div>
    <label for="select">Subject :</label>
    <select id="select" required>
        <option value="">--Please choose an option--</option>
        <option value="Information request">Information request</option>
        <option value="Funding">Funding</option>
        <option value="Other">Other</option>
    </select>
    <div>
        <label  for="message">Message :</label>
        <textarea  id="message"  name="message" required value="<?php if (isset($_POST['message'])) { echo $_POST['message']; } ?> "  ></textarea>
    </div>
        <p><?php  if(isset($errors['message1'])) { echo $errors['message1']; } ?></p>
        <div  class="button">
        <button  type="submit">Envoyer votre message</button>
    </div>
</form>


<?php

$errors = [];
$goodInput = [];

if (!empty($_POST)) {
    if(empty($_POST['name'])) {
        $errors ['name1'] = 'Your name cannot be empty';
    }
    if(empty($_POST['firstName'])) {
        $errors ['firstName1'] = 'Your first name cannot be empty';
    }
    if(empty($_POST['email'])) {
        $errors ['email1'] = 'Your Email cannot be empty';
    }
    if (!empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
            $goodInput['email'] =  'Your Email is okay!';
    }
    if(empty($_POST['phone'])) {
        $errors ['phone1'] = 'Your phone cannot be empty';
    }
    if(empty($_POST['message'])) {
        $errors ['message1'] = 'Your phone cannot be empty';
    }


}
if (count($errors) == 0){

    header("Location:succes.php");

}

