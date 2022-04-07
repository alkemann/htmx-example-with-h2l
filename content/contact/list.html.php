<h2>Contacts</h2>
<ul hx-target="#content" hx-swap="innerHTML">
	<?php foreach ($contacts as $id => $name) : ?>
	<li>
		<a href="/contact/<?=$id?>" 
		   hx-get="/contact/<?=$id?>"
		   hx-push-url="/contact/<?=$id?>"
		   ><?=$name?></a>
	</li>
	<?php endforeach; ?>
</ul>
