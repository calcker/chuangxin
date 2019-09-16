<template>
	<div class="alertBox">
	    <div v-if="errors" class="alert alert-danger" role="alert">
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	   			<span aria-hidden="true">&times;</span>
	  		</button>
	    	<p>
		        <ul v-if="errorsType == 'string'">
		            <li>{{ errors }}</li>
		        </ul>
		        <ul v-else>
		            <li v-for="(value, key, index) in errors">{{ value[0] }}</li>
		        </ul>
	    	</p>
	    </div>
	    <div v-if="success" class="alert alert-danger alert-dismissible fade show" role="alert">
	        {{ success }}
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	   			<span aria-hidden="true">&times;</span>
	  		</button>
	    </div>
	</div>
</template>

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