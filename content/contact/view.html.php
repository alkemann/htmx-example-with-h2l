<h2>Edit: <?=$person['firstName']. ' ' . $person['lastName']?></h2>
<div><label>First Name</label>: <?=$person['firstName']?></div>
<div><label>Last Name</label>: <?=$person['lastName']?></div>
<div><label>Email</label>: <?=$person['email']?></div>
<div><a class="btn btn-primary"
        href="/contact/<?=$id?>/edit"
        hx-get="/contact/<?=$id?>/edit"
        hx-target="#content"
        hx-push-url="/contact/<?=$id?>/edit"
    >Edit</a></div>
