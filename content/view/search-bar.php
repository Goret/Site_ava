<script type="text/javascript">
	function searchanim() {
		var link = document.getElementById('search-field');
		var value = link.value;

		link.value = '';
	}
</script>
<div id="search-bar">
	<form action="Rechercher#search-results" method="post" id="search-form">
		<div>
			<input type="submit" id="search-button" name="rechercher" value="" tabindex="41"/>
			<input type="text" onclick="searchanim()" id="search-field" name="name" maxlength="200" tabindex="40" alt="Rechercher un personnage..." value="Rechercher un personnage..."/>
		</div>
	</form>
</div>
