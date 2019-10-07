<template>
	<div class="text-center">
        <div class="spinner-border m-5" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</template>
<style type="text/css">

</style>
<script>
    export default {
        props: ['loading'],
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