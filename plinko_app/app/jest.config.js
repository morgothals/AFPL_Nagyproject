/*
module.exports = {
    preset: 'ts-jest/presets/js-with-babel',
    testEnvironment: 'jsdom',
    transform: {
        '^.+\\.vue$': '@vue/vue3-jest',
        '^.+\\.js$': 'babel-jest',
    },
};
*/

module.exports = {
    preset: '@vue/cli-plugin-unit-jest',
    testEnvironment: 'jsdom',
    moduleFileExtensions: ['js', 'ts', 'vue', 'json'],
    transform: {
        '^.+\\.vue$': '@vue/vue3-jest',
        '^.+\\.js$': 'babel-jest',
        '^.+\\.ts$': 'ts-jest'

    },
    transformIgnorePatterns: ['<rootDir>/node_modules/(?!vuetify)'],
    moduleFileExtensions: ['js', 'json', 'vue'],
    moduleNameMapper: {
        '.+\\.(css|styl|less|sass|scss|png|jpg|ttf|woff|woff2)$': '<rootDir>/tests/ts/styleMock.ts',
        '^@/(.*)$': '<rootDir>/resources/js/$1',
    },
    setupFiles: ['<rootDir>/tests/ts/setup.ts'],
};
