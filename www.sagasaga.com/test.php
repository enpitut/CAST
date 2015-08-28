<html>
<body>

<form action="API/User/register.php" method="post">

Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
address: <input type="text" name="address"><br>
sex: <input type="text" name="sex"><br>
age: <input type="text" name="age"><br>
password: <input type="text" name="passwword"><br>

<input type="submit">
</form>


<form action="API/User/login.php" method="post">
LOGIN
</br>
Name: <input type="text" name="name"><br>
password: <input type="text" name="passwword"><br>

<input type="submit">
</form>

update
<form action="API/User/userUpdate.php" method="post">

Name: <input type="text" name="name"><br>
E-mail: <input type="text" name="email"><br>
address: <input type="text" name="address"><br>
sex: <input type="text" name="sex"><br>
age: <input type="text" name="age"><br>
password: <input type="text" name="passwword"><br>

<input type="submit">
</form>

new GOODS
<form action="API/GOODS/newGoods.php" method="post"
enctype="multipart/form-data">
<label for="file">Filename:</label>
<input type="text" name="description" id="description" />
<input type="file" name="file" id="file" />
<br />
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>