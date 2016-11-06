<template lang="html">
    <div class="sidebar-nav" id="sidebar-div">
        <!-- SIDEBARLIST START -->
        <ul v-if='!addChildShow'
            class="nav "
            id="childrenList">

            <li v-for="child in currentChildrenArray">
                <a @click.self="selectedChildFn(child.id)"
                    id='child_{{ child.id }}'>

                    <span v-if="child.gender === 'boy'" @click.self="selectedChildFn(child.id)">
                        <i class="fa fa-mars"></i> {{ child.childName }}
                    </span>
                    <span v-else @click.self="selectedChildFn(child.id)">
                        <i class="fa fa-venus"></i> {{ child.childName }}
                    </span>

                    <i v-if='selectedChild==child.id'
                        @click="openEditChildForm"
                        style="position:absolute;left:10px;"
                        class="fa fa-cog pull-left cog-wheel fontawesomefix">
                    </i>
                </a>
            </li>

            <li>
                <a @click="openAddChildForm"
                    class="add-child">

                    <i class="fa fa-plus"></i> ADD CHILD
                </a>
            </li>

            <li>
                <a href="/personal/photobook/buy" target="_blank"
                    class="buy-book">

                    <i class="fa fa-shopping-cart"></i> BUY BOOK
                </a>
            </li>

            <li class="close-button" style="background-color: red !important;">
                <a @click="toggleNav($event)">
                    <i class="fa fa-times"></i> CLOSE
                </a>
            </li>
        </ul>
        <!-- SIDEBARLIST END -->
    </div>
</template>

<script>
    export default {
        props: {
            currentChildren: {
                type: Array
            },
            selectedChild: {
                type: [String, Number]
            },
            editChildShow: {
                type: Boolean
            },
            toggleSideBar: {
                type: Function
            },
            openAddChildForm: {
                type: Function
            },
            openEditChildForm: {
                type: Function
            },
            hasClass: {
                type: Function
            },
            toggleNav: {
                type: Function
            }
        },
        data () {
            return {
                currentChildrenArray: []
            }
        },
        computed: {},
        ready () {
            //wait on api data.
            this.$on('data-arrived', function () {
                for( var i=0; i < this.currentChildren.length; i++ ) {
                    this.currentChildrenArray.push(this.currentChildren[i]);
                }
            });
            //re-add everything
            if(this.currentChildrenArray.length <= 0) {
                for( var i=0; i < this.currentChildren.length; i++ ) {
                    this.currentChildrenArray.push(this.currentChildren[i]);
                }
            }
        },
        watch: {
            selectedChild: function (value) {}
        },
        methods: {
            selectedChildFn: function (id) {
                if(this.selectedChild === id) {
                    this.selectedChild = 'none'
                    var childListItem = document.getElementById('child_' + id);
                    var activeChildListItem = document.getElementsByClassName('active');
                    for(var i = 0; i < activeChildListItem.length; i++) {
                        activeChildListItem[i].className = '';
                    }
                }
                else{
                    this.selectedChild = id;
                    var childListItem = document.getElementById('child_' + id);
                    var activeChildListItem = document.getElementsByClassName('active');
                    for(var i = 0; i < activeChildListItem.length; i++) {
                        activeChildListItem[i].className = '';
                    }
                    childListItem.className += 'active';
                }
            }
        },
        components: {}
    }
</script>

<style lang="css" scoped>

</style>
