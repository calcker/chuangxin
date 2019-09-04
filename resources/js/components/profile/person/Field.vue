<template>
    <div class="field">
        <div v-if="updating" class="input-group">
            <div id="test">
                <select v-model="selected">
                    <option v-for="yx in YX" :value="yx.text">
                        {{yx.text}}
                    </option>
                </select>
                <select>
                    <option v-for="zy in selection" :value="zy.text" :selected="$index == 0 ? true : false">
                        {{zy.text}}
                    </option>
                  </select>
            </div>
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
    export default {
        props: ['value'],
        data() {
            return {
                time: null,
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
