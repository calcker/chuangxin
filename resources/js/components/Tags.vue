<template>
	<div class="tags">
		<div v-for="tag in tags" class="alert alert-success" role="alert">
			{{ tag }}
			<button v-if="deletable" @click="onDelete" type="button" class="close" data-dismiss="alert" aria-label="Close" :value="tag">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
	</div>
</template>
<script>
    export default {
        props: ['tags', 'deletable'],
        methods: {
        	onDelete(event) {

        		let tags = this.tags,
        			name = $(event.target).parent().val();

        		$.each(tags, function(i, tag){

        			if( tag == name ) tags.splice(i, 1);

        		});
        		
        		this.$emit("update:tags", tags);

        	}

        }

    }
</script>