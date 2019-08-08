<template>
	<div id="app-home" class="row">
		<div class="col-8">
			<message></message>
			<feeds></feeds>
		</div>
		<div class="col-4">
			<my></my>
		</div>
	</div>
</template>

<script>
	import Message from './Message'
	import Feeds from './Feeds'
	import My from './My'
	export default {
		components: {Message, Feeds, My}
	}
</script>
