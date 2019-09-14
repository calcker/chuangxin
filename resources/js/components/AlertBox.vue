<template>
    <div v-if="errors" class="alert alert-danger" role="alert">
        <ul>
            <li v-for="(value, key, index) in errors">{{ value[0] }}</li>
        </ul>
    </div>
    <div v-if="success" class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ success }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
   			<span aria-hidden="true">&times;</span>
  		</button>
    </div>
</template>

<script>
    export default {
        props: ['errors', 'success'],
        computed: {

        	errorsType() {

        		
        	}

        }

    }
</script>