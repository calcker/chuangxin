<template>
	<div class="alertBox">
		<div v-if="info.errors" class="alert alert-danger alert-dismissible fade show" role="alert">
			<p v-for="item in info.errors">
				{{item}}
			</p>
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="clear">
	   			<span aria-hidden="true">&times;</span>
	  		</button>
	    </div>
	    <div v-if="info.success" class="alert alert-success alert-dismissible fade show" role="alert">
	    	<p v-for="item in info.success">
				{{item}}
			</p>
	        <button type="button" class="close" data-dismiss="alert" aria-label="Close" @click="clear">
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
        data () {
        	return {
        		info: {
        			errors: null,
        			success: null
        		}
        	}
        },
        created () {

        	this.fillErrors();
        	this.fillSuccess();

        },
        methods: {

        	fillErrors() {

        		if(this.errors) {

	        		if (typeof(this.errors) == "string"){
	        		
	        			this.info.errors = [this.errors];
	        		
	        		} else if (typeof(this.errors) == "object") {

	        			let errors = new Array();

	        			$.each(this.errors, function(key, value) {

	        				for(var i = 0; i < value.length; i++) {
	        					errors.push(value[i]);
	        				}
	        			
	        			});

	        			this.info.errors = errors;

	        		}

        		}
        	},

        	fillSuccess() {

        		if(this.success) {

	        		if (typeof(this.success) == "string"){
	        		
	        			this.info.success = [this.success];
	        		
	        		} else if (typeof(this.success) == "object") {

	        			let success = new Array();

	        			$.each(this.success, function(key, value) {

	        				for(var i = 0; i < value.length; i++) {
	        					success.push(value[i]);
	        				}
	        			
	        			});

	        			this.info.success = success;

	        		}

        		}

        	},

        	clear() {
        		
        		this.$emit("update:errors", '');
        		this.$emit("update:success", '');
        		this.info.errors = null;
        		this.info.success = null;

        	}

        }

    }
</script>