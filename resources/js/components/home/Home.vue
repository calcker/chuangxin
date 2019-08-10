<template>
	<div id="app-home" class="row">
		<div class="col-8">
			<message></message>
			<feeds></feeds>
		</div>
		<div class="col-4">
			<user></user>
		</div>
	</div>
</template>

<script>
	import Message from './Message'
	import Feeds from './Feeds'
	import User from './User'
	export default {
		components: {Message, Feeds, User}
	}
</script>
