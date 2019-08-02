<template>
	<div id="app-home" class="row">
		<div class="col-9">
			<feeds></feeds>
		</div>
		<div class="col-3">
			<my></my>
		</div>
	</div>
</template>

<script>
	import Feeds from './Feeds'
	import My from './My'
	export default {
		components: {Feeds, My}
	}
</script>
