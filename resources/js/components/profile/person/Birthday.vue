<template>
    <div class="birthday">
        <div v-if="updating" class="input-group">
            <vue-datepicker-local v-model="time" @confirm="confirm" show-buttons></vue-datepicker-local>
        </div>
        <div v-else class="input-group">
            <input id="birthday" class="form-control" type="text" :placeholder="value" readonly>
            <div class="input-group-append">
                <button @click="changeUpdateState" class="btn btn-primary" type="button"><i class="fas fa-pencil-alt"></i> 修改</button>
            </div>
        </div>
    </div>
</template>

<script>
    import VueDatepickerLocal from 'vue-datepicker-local'

    export default {
        props: ['value'],
        data() {
            return {
                time: new Date(),
                name: this.value,
                updating: false
            };
        },
        methods: {
            update: function(){
                console.log('ffa');

            },
            changeUpdateState: function(){

                this.updating = !this.updating;

            }

        }
    }
</script>
