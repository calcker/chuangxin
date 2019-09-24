<template>
	<div class="tags">
		<div v-for="tag in tags" class="alert alert-primary" role="alert">
			{{ tag.name }}
			<button v-if="deletable" @click="onDelete" type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</template>
<style type="text/css">

</style>
<script>
    export default {
        props: ['tags', 'deletable'],
        methods: {
        	onDelete(event) {

        		let tags = this.tags,
        			name = $(event.target).parent().text();

        		$.each(tags, function(i, tag){

        			if( tag.name == name ) tags.splice(i, 1);

        		});
        		
        		this.$emit("update:tags", tags);

        	}

        }

    }
</script>