
<div hx-target="this" hx-swap="outerHTML">
    <div><label>First Name</label>: <?=$person['firstName']?></div>
    <div><label>Last Name</label>: <?=$person['lastName']?></div>
    <div><label>Email</label>: <?=$person['email']?></div>
    <button hx-get="/contact/<?=$id?>/edit" class="btn btn-primary">
    Click To Edit
    </button>
</div>
