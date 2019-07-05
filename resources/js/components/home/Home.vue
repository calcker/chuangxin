<template>
	<div id="app-home" class="row">
		<div class="col">
			<recommend></recommend>
		</div>
		<div class="col-6">
			<focus></focus>
		</div>
		<div class="col">
			<my></my>
		</div>
	</div>
</template>

<script>
	import Recommend from './Recommend'
	import Focus from './Focus'
	import My from './My'
	export default {
		components: {Recommend, Focus, My}
	}
</script>
