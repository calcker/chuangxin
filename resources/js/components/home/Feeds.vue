<template>
	<h3>关注动态</h3>
</template>

<script>
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

		mounted: {


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



		},

		methods: {

			getFeeds: {

				let data = {
					user_id: this.$store.getters.user_id
				};

				axios.post('feeds', this.post).then(response => {

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
