<template>
    <div class="alert alert-danger" role="alert">
        <p>
            <slot>{{ errors }}</slot>
        </p>
    </div>
</template>

<script>
    export default {
    }
</script>