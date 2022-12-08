<?php

/*
 * @package     XT Tailwind for Joomla
 *
 * @author      Extly, CB. <team@extly.com>
 * @copyright   Copyright (c)2012-2022 Extly, CB. All rights reserved.
 * @license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL
 *
 * @see         https://www.extly.com
 */

$header = <<<'EOF'
@package     XT Tailwind for Joomla

@author      Extly, CB. <team@extly.com>
@copyright   Copyright (c)2012-2022 Extly, CB. All rights reserved.
@license     https://www.gnu.org/licenses/gpl-3.0.html GNU/GPL

@see         https://www.extly.com
EOF;

return (new PhpCsFixer\Config())
    ->setRules([
        // Symfony PHP framework 6.2/.php-cs-fixer.dist.php
        // https://github.com/symfony/symfony/blob/6.2/.php-cs-fixer.dist.php
        '@PHP71Migration' => true,
        '@PHPUnit75Migration:risky' => true,
        '@Symfony' => true,
        '@Symfony:risky' => true,
        'protected_to_private' => false,
        'nullable_type_declaration_for_default_null_value' => ['use_nullable_type_declaration' => false],
        'no_superfluous_phpdoc_tags' => ['remove_inheritdoc' => true],
        'header_comment' => ['header' => $header],
        'modernize_strpos' => true,
        'get_class_to_class_keyword' => true,

        // PHP CS Fixer - Laravel Coding Style Ruleset
        // https://gist.github.com/laravel-shift/cab527923ed2a109dda047b97d53c200
        'array_indentation' => true,
        'array_syntax' => ['syntax' => 'short'],
        'binary_operator_spaces' => [
            'default' => 'single_space',
            'operators' => ['=>' => null],
        ],
        'blank_line_after_namespace' => true,
        'blank_line_after_opening_tag' => true,
        'blank_line_before_statement' => [
            'statements' => ['return'],
        ],
        'braces' => true,
        'cast_spaces' => true,
        'class_attributes_separation' => [
            'elements' => [
                'const' => 'one',
                'method' => 'one',
                'property' => 'one',
                'trait_import' => 'none',
            ],
        ],
        'class_definition' => [
            'multi_line_extends_each_single_line' => true,
            'single_item_single_line' => true,
            'single_line' => true,
        ],
        'concat_space' => [
            'spacing' => 'none',
        ],
        'constant_case' => ['case' => 'lower'],
        'declare_equal_normalize' => true,
        'elseif' => true,
        'encoding' => true,
        'full_opening_tag' => true,
        'fully_qualified_strict_types' => true, // added by Shift
        'function_declaration' => true,
        'function_typehint_space' => true,
        'general_phpdoc_tag_rename' => true,
        'heredoc_to_nowdoc' => true,
        'include' => true,
        'increment_style' => ['style' => 'post'],
        'indentation_type' => true,
        'linebreak_after_opening_tag' => true,
        'line_ending' => true,
        'lowercase_cast' => true,
        'lowercase_keywords' => true,
        'lowercase_static_reference' => true, // added from Symfony
        'magic_method_casing' => true, // added from Symfony
        'magic_constant_casing' => true,
        'method_argument_space' => [
            'on_multiline' => 'ignore',
        ],
        'multiline_whitespace_before_semicolons' => [
            'strategy' => 'no_multi_line',
        ],
        'native_function_casing' => true,
        'no_alias_functions' => true,
        'no_extra_blank_lines' => [
            'tokens' => [
                'extra',
                'throw',
                'use',
            ],
        ],
        'no_blank_lines_after_class_opening' => true,
        'no_blank_lines_after_phpdoc' => true,
        'no_closing_tag' => true,
        'no_empty_phpdoc' => true,
        'no_empty_statement' => true,
        'no_leading_import_slash' => true,
        'no_leading_namespace_whitespace' => true,
        'no_mixed_echo_print' => [
            'use' => 'echo',
        ],
        'no_multiline_whitespace_around_double_arrow' => true,
        'no_short_bool_cast' => true,
        'no_singleline_whitespace_before_semicolons' => true,
        'no_spaces_after_function_name' => true,
        'no_spaces_around_offset' => [
            'positions' => ['inside', 'outside'],
        ],
        'no_spaces_inside_parenthesis' => true,
        'no_trailing_comma_in_list_call' => true,
        'no_trailing_comma_in_singleline_array' => true,
        'no_trailing_whitespace' => true,
        'no_trailing_whitespace_in_comment' => true,
        'no_unneeded_control_parentheses' => [
            'statements' => ['break', 'clone', 'continue', 'echo_print', 'return', 'switch_case', 'yield'],
        ],
        'no_unreachable_default_argument_value' => true,
        'no_useless_return' => true,
        'no_whitespace_before_comma_in_array' => true,
        'no_whitespace_in_blank_line' => true,
        'normalize_index_brace' => true,
        'not_operator_with_successor_space' => true,
        'object_operator_without_whitespace' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'psr_autoloading' => true,
        'phpdoc_indent' => true,
        'phpdoc_inline_tag_normalizer' => true,
        'phpdoc_no_access' => true,
        'phpdoc_no_package' => true,
        'phpdoc_no_useless_inheritdoc' => true,
        'phpdoc_scalar' => true,
        'phpdoc_single_line_var_spacing' => true,
        'phpdoc_summary' => false,
        'phpdoc_to_comment' => false, // override to preserve user preference
        'phpdoc_tag_type' => true,
        'phpdoc_trim' => true,
        'phpdoc_types' => true,
        'phpdoc_var_without_name' => true,
        'self_accessor' => true,
        'short_scalar_cast' => true,
        'simplified_null_return' => false, // disabled as "risky"
        'single_blank_line_at_eof' => true,
        'single_blank_line_before_namespace' => true,
        'single_class_element_per_statement' => [
            'elements' => ['const', 'property'],
        ],
        'single_import_per_statement' => true,
        'single_line_after_imports' => true,
        'single_line_comment_style' => [
            'comment_types' => ['hash'],
        ],
        'single_quote' => true,
        'space_after_semicolon' => true,
        'standardize_not_equals' => true,
        'switch_case_semicolon_to_colon' => true,
        'switch_case_space' => true,
        'ternary_operator_spaces' => true,
        'trailing_comma_in_multiline' => ['elements' => ['arrays']],
        'trim_array_spaces' => true,
        'unary_operator_spaces' => true,
        'visibility_required' => [
            'elements' => ['method', 'property'],
        ],
        'whitespace_after_comma_in_array' => true,

        // Custom - Ordered Class Elements
        'ordered_class_elements' => ['order' => ['use_trait', 'constant_public', 'constant_protected', 'constant_private', 'property_public', 'property_protected', 'property_private', 'construct', 'destruct', 'magic', 'phpunit', 'method_public', 'method_protected', 'method_private']],

        // Custom - Disable PSR0
        'psr_autoloading' => false,

        // Custom - Not Operator With Successor Space
        'not_operator_with_successor_space' => false,

        // Custom - Modernize Strpos - https://cs.symfony.com/doc/rules/alias/modernize_strpos.html
        'modernize_strpos' => false,

        // Custom - Get Class To Class Keyword
        'get_class_to_class_keyword' => false,
    ])
    ->setRiskyAllowed(true)
    ->setFinder(
        (new PhpCsFixer\Finder())
            ->in(__DIR__)
            ->append([__FILE__])
            ->notPath('#/Fixtures/#')
            ->exclude([
                // directories containing files with content that is autogenerated by `var_export`, which breaks CS in output code
                // fixture templates
                'Symfony/Bundle/FrameworkBundle/Tests/Templating/Helper/Resources/Custom',
                // resource templates
                'Symfony/Bundle/FrameworkBundle/Resources/views/Form',
                // explicit trigger_error tests
                'Symfony/Bridge/PhpUnit/Tests/DeprecationErrorHandler/',
                'Symfony/Component/Intl/Resources/data/',
            ])
            // Support for older PHPunit version
            ->notPath('Symfony/Bridge/PhpUnit/SymfonyTestsListener.php')
            ->notPath('#Symfony/Bridge/PhpUnit/.*Mock\.php#')
            ->notPath('#Symfony/Bridge/PhpUnit/.*Legacy#')
            // file content autogenerated by `var_export`
            ->notPath('Symfony/Component/Translation/Tests/fixtures/resources.php')
            // file content autogenerated by `VarExporter::export`
            ->notPath('Symfony/Component/Serializer/Tests/Fixtures/serializer.class.metadata.php')
            // test template
            ->notPath('Symfony/Bundle/FrameworkBundle/Tests/Templating/Helper/Resources/Custom/_name_entry_label.html.php')
            // explicit trigger_error tests
            ->notPath('Symfony/Component/ErrorHandler/Tests/DebugClassLoaderTest.php')
    )
    ->setCacheFile('.php-cs-fixer.cache');
