<template>
	<div class="captcha">
		<div class="input-group">
			<input type="text" class="form-control" id="captcha" v-model="input" :disabled="disabled" placeholder="验证码">
  			<div class="input-group-append">
    			<img :src="src" style="cursor: pointer" title="点击更换" @click="generate">
    			<button class="btn btn-link" type="button" @click="generate">看不清? 换一张</button>
  			</div>
		</div>
	</div>		
</template>

<script>
    export default {
    	props: ['disabled'],
        data () {
        	return {
        		src: null,
        		input: null,
        	}
        },
        created () {

        	this.generate();
        
        },
        methods: {

        	generate() {

                this.input = null;
        		this.src = '/captcha?' + Math.random();

        	}

        }

    }
</script>