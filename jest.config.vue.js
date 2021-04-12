module.exports = {
    testEnvironment          : 'jsdom',
    "moduleFileExtensions": ["js", "json", "vue"],
    "transform": {
        "^.+\\.vue$": "vue-jest"
    },
    "transformIgnorePatterns": [
        "node_modules/(?!variables/.*)"
    ],

};
