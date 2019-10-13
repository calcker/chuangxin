<template>
	<div v-if="src" class="captcha">
		<div class="input-group">
			<input type="text" class="form-control" id="captcha" v-model="inputCaptcha" placeholder="验证码">
  			<div class="input-group-append">
    			<img :src="src" style="cursor: pointer" title="点击图片重新获取验证码">
    			<button class="btn btn-link" type="button">看不清? 换一张</button>
  			</div>
		</div>

		<!--
		<div class="row">
			<div class="col-md-3">
				<input type="text" class="form-control" id="captcha" v-model="inputCaptcha" placeholder="验证码">
			</div>
			<div class="col-md-3">
				<img :src="src" style="cursor: pointer">
			</div>
			<div class="col-md-6">
				<p>看不清？换一张</p>
			</div>
		</div>
		-->
	</div>		
</template>

<script>
    export default {
        data () {
        	return {
        		src: '/captcha?' + Math.random(),
        		inputCaptcha: null,
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