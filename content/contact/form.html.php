
<form method="POST" action="/contact/<?=$id?>"
      hx-target="#content"
      hx-push-url="/contact/<?=$id?>"
      hx-boost="true">
  <div>
    <label>First Name</label>
    <input type="text" name="firstName" value="<?=$person['firstName']?>">
  </div>
  <div class="form-group">
    <label>Last Name</label>
    <input type="text" name="lastName" value="<?=$person['lastName']?>">
  </div>
  <div class="form-group">
    <label>Email Address</label>
    <input type="email" name="email" value="<?=$person['email']?>">
  </div>
  <a class="btn" href="/contact/<?=$id?>">Cancel</a> |
    <input type="submit" name="Submit" />
</form>
