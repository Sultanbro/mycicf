import {createLocalVue, shallowMount} from "@vue/test-utils";
import Sandbox from '../../resources/js/components/sandbox.vue';

describe('Sandbox.vue', () => {
    let localVue;

    beforeEach(() => {
        localVue = createLocalVue();
    })

    it('should be the correct text', () => {
        {
            let wrapper = shallowMount(Sandbox, {
                localVue,
                data: () => ({a: 2})
            });

            expect(wrapper.text()).toMatch('Sandbox 2');
        }
        {
            let wrapper = shallowMount(Sandbox, {
                data: () => ({a: 6, b: 1})
            });
            expect(wrapper.text()).toMatch('Sandbox 6');
            expect(wrapper.find('p').text()).toMatch('1');
        }
    });
});
