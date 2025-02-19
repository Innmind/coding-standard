<?php
declare(strict_types = 1);

namespace Innmind\CodingStandard;

use PhpCsFixer\{
    Finder,
    Config,
    ConfigInterface,
    Runner\Parallel\ParallelConfigFactory,
};

final class CodingStandard
{
    /**
     * @param array<string, array<string, mixed>|bool> $override
     *
     * @return array<string, array<string, mixed>|bool>
     */
    public static function rules(array $override = []): array
    {
        return \array_merge(
            [
                '@PSR2' => true,
                'braces' => [
                    'allow_single_line_closure' => true,
                ],
                'array_syntax' => ['syntax' => 'short'],
                'phpdoc_summary' => false,
                'yoda_style' => false,
                'phpdoc_annotation_without_dot' => false,
                'simplified_null_return' => true,
                'return_type_declaration' => ['space_before' => 'none'],
                'phpdoc_to_comment' => false,
                'phpdoc_align' => false,
                'blank_line_after_opening_tag' => false,
                'blank_line_before_statement' => ['statements' => ['continue', 'do', 'exit', 'for', 'foreach', 'if', 'include', 'include_once', 'require', 'require_once', 'return', 'switch', 'throw', 'try', 'while']],
                'class_keyword_remove' => false,
                'combine_nested_dirname' => true,
                'date_time_immutable' => true,
                'declare_equal_normalize' => ['space' => 'single'],
                'declare_strict_types' => true,
                'elseif' => false,
                'final_public_method_for_abstract_class' => true,
                'fully_qualified_strict_types' => true,
                'function_declaration' => ['closure_function_spacing' => 'none', 'closure_fn_spacing' => 'none'],
                'function_typehint_space' => true,
                'global_namespace_import' => [
                    'import_classes' => false,
                    'import_constants' => false,
                    'import_functions' => false,
                ],
                'linebreak_after_opening_tag' => true,
                'list_syntax' => ['syntax' => 'short'],
                'lowercase_cast' => true,
                'lowercase_static_reference' => true,
                'method_chaining_indentation' => true,
                'modernize_types_casting' => true,
                'native_constant_invocation' => ['scope' => 'all'],
                'native_function_invocation' => [
                    'exclude' => ['join'],
                    'include' => ['@internal'],
                    'scope' => 'all',
                ],
                'new_with_braces' => false,
                'no_blank_lines_after_class_opening' => true,
                'no_blank_lines_after_phpdoc' => true,
                'no_empty_comment' => true,
                'no_empty_phpdoc' => true,
                'no_empty_statement' => true,
                'no_extra_blank_lines' => true,
                'no_leading_import_slash' => true,
                'no_leading_namespace_whitespace' => true,
                'no_mixed_echo_print' => ['use' => 'echo'],
                'no_multiline_whitespace_around_double_arrow' => true,
                'multiline_whitespace_before_semicolons' => ['strategy' => 'no_multi_line'],
                'no_null_property_initialization' => false,
                'no_short_bool_cast' => true,
                'echo_tag_syntax' => ['format' => 'long'],
                'no_singleline_whitespace_before_semicolons' => true,
                'no_spaces_around_offset' => true,
                'method_argument_space' => ['on_multiline' => 'ignore'],
                'no_spaces_after_function_name' => false,
                'no_superfluous_phpdoc_tags' => [
                    'allow_mixed' => true,
                    'remove_inheritdoc' => true,
                ],
                'no_trailing_comma_in_list_call' => false,
                'no_trailing_comma_in_singleline_array' => true,
                'no_unneeded_control_parentheses' => true,
                'no_unset_cast' => true,
                'no_unset_on_property' => true,
                'no_unused_imports' => true,
                'no_useless_else' => true,
                'no_useless_return' => true,
                'no_whitespace_in_blank_line' => true,
                'normalize_index_brace' => true,
                'not_operator_with_space' => false,
                'not_operator_with_successor_space' => false,
                'object_operator_without_whitespace' => true,
                'ordered_class_elements' => true,
                'phpdoc_order' => true,
                'self_accessor' => true,
                'self_static_accessor' => true,
                'semicolon_after_instruction' => true,
                'set_type_to_cast' => true,
                'short_scalar_cast' => true,
                'single_blank_line_before_namespace' => true,
                'single_import_per_statement' => false,
                'single_quote' => ['strings_containing_single_quote_chars' => false],
                'single_trait_insert_per_statement' => true,
                'space_after_semicolon' => ['remove_in_empty_for_expressions' => true],
                'standardize_not_equals' => true,
                'static_lambda' => true,
                'strict_comparison' => true,
                'strict_param' => true,
                'trailing_comma_in_multiline' => ['elements' => ['arrays', 'arguments', 'parameters']],
                'whitespace_after_comma_in_array' => true,
                'nullable_type_declaration_for_default_null_value' => true,
            ],
            $override,
        );
    }

    /**
     * @param list<string> $files
     * @param ?array<string, array<string, mixed>|bool> $rules
     */
    public static function config(array $files, ?array $rules = null): ConfigInterface
    {
        $finder = Finder::create();

        foreach ($files as $file) {
            $finder = $finder->in($file);
        }

        return (new Config)
            ->setParallelConfig(ParallelConfigFactory::detect())
            ->setRules($rules ?? self::rules())
            ->setUsingCache(false)
            ->setRiskyAllowed(true)
            ->setFinder($finder);
    }
}
