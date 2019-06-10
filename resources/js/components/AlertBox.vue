<template>
    <div class="alert alert-danger" role="alert">
        <ul>
            <li v-for="(value, key, index) in errors">
                {{ value[0] }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        props: ['errors']
    }
</script>