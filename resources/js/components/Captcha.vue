<template>
	<div v-if="src" class="captcha">
		<input type="text" class="form-control" id="captcha" v-model="captcha" placeholder="验证码" :disabled="submitting == true">
		<img :src="src" style="cursor: pointer">
	</div>		
</template>

<script>
    export default {
        data () {
        	return {
        		src: '/captcha?' + Math.random(),
        		errors: null
        	}
        },
        created () {

        	this.getData();
        	//console.log(this.src);

        },
        methods: {

        	getData() {

        		axios.get('captcha').then(response => {

	                console.log(response);

	                if(response.data.code == 201) {

	                    const data = response.data.data;

	                    this.src = data.src;
	                
	                } else {

	                    this.errors = response.data.msg;
	                }

	            }).catch(error => {
	                
	                this.errors = error.response.data.msg;

	                if(!this.errors) this.errors = {unknown: ["未知错误"]};

	            });
        	}

        }

    }
</script>