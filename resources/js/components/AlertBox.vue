<template>
	<div class="alertBox">
	    <div v-if="errors" class="alert alert-danger alert-dismissible fade show" role="alert">
	        <ul class="errors" v-if="errorsType == 'string'">
	            {{ errors }}
	        </ul>
	        <ul class="errors" v-else>
	            <li v-for="(value, key, index) in errors">{{ value[0] }}</li>
	        </ul>
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	   			<span aria-hidden="true">&times;</span>
	  		</button>
	    </div>
	    <div v-if="success" class="alert alert-success alert-dismissible fade show" role="alert">
	        {{ success }}
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	   			<span aria-hidden="true">&times;</span>
	  		</button>
	    </div>
	</div>
</template>
<style type="text/css">
	.errors {
		list-style: none;
	}
</style>
<script>
    export default {
        props: ['errors', 'success'],

        computed: {

        	errorsType() {

        		return typeof this.errors;
        		
        	}

        }

    }
</script>