# HTMX examle app

This demo app demonstrates how to use HTMX to transform a server side rendered PHP app into a more 'interactive' app with AJAX requests switching out parts of the webpage. It is 100% "degradeable" so it works exactly the same for a user that has Javascript blocked (each  request just does a full page load).

## What are the moving parts

In this example there is very few moving parts. The framework doesnt do anything special, nor relevant for this example. Requests are dispatched to the Router that calls a Controller. The Controller talks to a mock service (pretend it has a DB behind it) and picks a view to create a response from.

### The one trick move

The one "clever" trick is a Middleware that looks for a request header (`HX-Request`) and uses it to tell the Response object wether it should pack the view into a layout or not. This along with the use of `hx-push-url` (or when it is done as automatic part of `hx-boost`), ensures that wether you navigated through ajax requests or not, you can always refresh the page or copy the url and it will take you to the complete page.

```php
// config/middlewares.php
function(Request $request, Chain $chain): Response {
    $response = $chain->next($request, $chain);
    if ($response instanceof Page && $request->header('HX-Request')) {
        $response->layout = false;
    }
    return $response;
}
```

## Editing the views to make them HTMX

If you look at the layout file `/layouts/default/head.html.php` you see we have a div target there with the  id `content`. It is what is targeted by the HTMX boosting (instead of the `body` default) so that we can keep the layout (header and footer).

So what do we need to do to the view files to HTMXify them? Lets take a look at each of them:

### The list

We start with (`content/contact/list.html.php`:
```php
<h2>Contacts</h2>
<ul>
	<?php foreach ($contacts as $id => $name) : ?>
	<li>
		<a href="/contact/<?=$id?>"><?=$name?></a>
	</li>
	<?php endforeach; ?>
</ul>
```

We could keep the list and add the form somewhere else very easily, but in this example we will just replace the list content with the view content. This can be done by adding `hx-boost` to the link tags. We want to only replace part of the page we also add the `hx-target` attribute. 

Since HTMX does something similar to JS hoisting, we can put the changes on the parent `ul` instead of each `a` tag. So we end up with:

```php
<h2>Contacts</h2>
<ul hx-target="#content" hx-boost="true">
	<?php foreach ($contacts as $id => $name) : ?>
	<li>
		<a href="/contact/<?=$id?>"><?=$name?></a>
	</li>
	<?php endforeach; ?>
</ul>
```

Similarily the view view (`content/contact/view.html.php`) has a link to editing the contact, we also just change that link to HTMX like so `<a class="btn btn-primary" href="/contact/<?=$id?>/edit" hx-boost="true" hx-target="#content" >Edit</a>`


### The form

The form view is almost as easily upgrade. We don't need to mess with the submit nor the cancel link. All the changes are done by adding `hx-target` and `hx-boost` to the `form` tag. The 1 gotcha here is that to ensure that the address bar in browser reflects the current state, we alost must add the `hx-push-url`:

```php
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
```





