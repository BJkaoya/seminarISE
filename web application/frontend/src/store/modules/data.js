export default {
    namespaced: true,
    state: {
        step: 0,
    },
    mutations: {
        //改变状态唯一
        changeStep(state, data) {
            state.step = data
        }
    },
    actions: {
        //不能改变状态
    }
}