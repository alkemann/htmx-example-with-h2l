
<form hx-post="/contact/<?=$id?>" hx-target="this" hx-swap="outerHTML">
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
  <button class="btn">Submit</button>
  <button class="btn" hx-get="/contact/<?=$id?>">Cancel</button>
</form>
