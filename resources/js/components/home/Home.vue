<template>
	<div id="app-home">
		<topBar></topBar>
		<div class="container">
			<div class="row">
				<div class="col-8">
					<message></message>
					<feeds></feeds>
				</div>
				<div class="col-4">
					<user></user>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
	import TopBar  from './TopBar'
	import Message from './Message'
	import Feeds from './Feeds'
	import User from './User'
	export default {
		components: {TopBar, Message, Feeds, User}
	}
</script>
