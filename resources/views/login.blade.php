<html><head><center><h1>Login</h1></center></head></html>
<form  method = "post" action="">
{{@csrf_field()}}
<center>
<table border = "2">
<tr>
<td><b>Email</b><br></td>
<td>:<br></td>
<td>
<input type="text" id="email" name="email" value ="{{old('email')}}"><br>
</td>
</tr>
@error('email')
            {{$message}}<br>
        @enderror
<tr>
<td><b>Password</b></td>
<td>:</td>
<td>
<input type="password" id="password" name="password" value ="{{old('password')}}"><br>
</td>
</tr>
@error('password')
            {{$message}}<br>
        @enderror
</table>
</center>
<br>
<!--<input type="checkbox" style="border: outset; border-color:#3CB371; float:middle" name="check" value="Remember Me">&nbsp;<b>Remember Me</b><br><br>-->
<center><input type="submit" name="submit" value="Log In"></center>

<center><p><b>New user?<a href="/register">Register here</a></p></center>
</form>

