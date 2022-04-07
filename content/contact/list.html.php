<h2>Contacts</h2>
<ul hx-target="#content" hx-boost="true">
	<?php foreach ($contacts as $id => $name) : ?>
	<li>
		<a href="/contact/<?=$id?>"><?=$name?></a>
	</li>
	<?php endforeach; ?>
</ul>
