<template>
	<div class="row" style="margin-top:20px">
		<div class="col">
			<ul class="nav nav-tabs">
	  			<li class="nav-item">
	 			   <a class="nav-link active" href="#">动态</a>
	  			</li>
	  			<li class="nav-item">
	 			   <a class="nav-link" href="#">灵感</a>
	  			</li>
	  			<li class="nav-item">
	    			<a class="nav-link" href="#">作品</a>
	  			</li>
	  			<li class="nav-item">
	    			<a class="nav-link" href="#">招聘</a>
	  			</li>
	  			<li class="nav-item">
	    			<a class="nav-link" href="#">出售</a>
	  			</li>
	  			<li class="nav-item">
	    			<a class="nav-link" href="#">消息</a>
	  			</li>
	  			<li class="nav-item">
	    			<a class="nav-link" href="#">外包</a>
	  			</li>
			</ul>
		</div>
	</div>
</template>

<script>
	import AlertBox from './../AlertBox'
	export default {
		data: function() {
			return {
	    		post: {
	     			name: '',
	     			email: '',
	      			password: '',
	      			agree: '',
	      			identity: 'person'
	    		},
				errors: '',
				submitted: false
			}
		},

		mounted() {

			this.update();

		},

		//mounted: {

			/*
			axios.post('login', this.post).then(response => {

	      		if(response.data.code == 201) {

	      			const data = response.data.data;

	      			this.$store.dispatch('SET_AUTH_DATA', data);
	      			this.$router.push({ path: '/home' });

	      		} else {

	      			this.errors = response.data.msg;
	      			this.afterSubmit();
	      		}


	      	}).catch(error => {

	       		this.errors = error.response.data.errors;

	       		if(!this.errors) this.errors = {unknown: ["未知错误"]};

  				this.$store.dispatch('DEL_AUTH_DATA');

  				this.afterSubmit();

        	});
			*/


		//},

		methods: {

			update: function(){

				//if()

				//console.log('fasd');
				
				//let data = {
				//	user_id: this.$store.getters.user_id
				//};

				axios.post('/feeds/update', 'dd').then(response => {

		      		console.log(response);


		      	}).catch(error => {
					
					console.log(error);

	        	});
				

			},

			backward: function(){

				axios.post('/feeds/backward', 'dd').then(response => {

		      		console.log(response);


		      	}).catch(error => {
					
					console.log(error);

	        	});

			},

			createPost: function(){
		      	var self = this;
		      	this.beforeSubmit();
		      	axios.post('/register/email', self.post).then(function(response) {
		      		if(response.data.code == 201){
		        		sessionStorage.setItem('email', response.data.data.email);
		      			sessionStorage.setItem('name', response.data.data.name);
		      			self.afterSubmit();
		        		self.$router.push({path: '/register/email/success'});
		      		}else{
		      			self.errors = response.data.msg;
		      		}
		    	}).catch(function (error) {
		       		self.errors = error.response.data.msg;
		      		self.afterSubmit();
		      	});
    		},
    		beforeSubmit: function(){
		       	this.errors = '';
		        this.submitted = true;
    		},
    		afterSubmit: function(){
    			this.submitted = false;
    		}
		},
		components: {AlertBox}
	}
</script>
