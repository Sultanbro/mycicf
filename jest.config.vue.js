module.exports = {
    presets: [
        '@vue/cli-plugin-babel/preset'
    ],
    testEnvironment          : 'jsdom',
    "moduleFileExtensions": ["js", "json", "vue"],
    "transform": {
        "^.+\\.vue$": "vue-jest"
    },
    "transformIgnorePatterns": [
        "node_modules/(?!variables/.*)"
    ],

};
