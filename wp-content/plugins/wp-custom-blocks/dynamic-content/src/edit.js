/**
 * Retrieves the translation of text.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-i18n/
 */
import { __ } from '@wordpress/i18n';

/**
 * React hook that is used to mark the block wrapper element.
 * It provides all the necessary props like the class name.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/packages/packages-block-editor/#useblockprops
 */
import {
	useBlockProps,
	InspectorControls,
	InnerBlocks,
} from '@wordpress/block-editor';

import { PanelBody, SelectControl } from '@wordpress/components';
/**
 * Lets webpack process CSS, SASS or SCSS files referenced in JavaScript files.
 * Those files can contain any CSS code that gets applied to the editor.
 *
 * @see https://www.npmjs.com/package/@wordpress/scripts#using-css
 */
import './editor.scss';

/**
 * The edit function describes the structure of your block in the context of the
 * editor. This represents what the editor will render when the block is used.
 *
 * @see https://developer.wordpress.org/block-editor/reference-guides/block-api/block-edit-save/#edit
 *
 * @return {WPElement} Element to render.
 */
export default function Edit( { attributes, setAttributes } ) {
	const { device } = attributes;

	const options = [
		{ value: 'all',     label: __( 'All devices', 'wp-custom-blocks' ) },
		{ value: 'desktop', label: __( 'Desktop', 'wp-custom-blocks' ) },
		{ value: 'mobile',  label: __( 'Mobile', 'wp-custom-blocks' ) },
		{ value: 'samsung', label: __( 'Samsung (mobile)', 'wp-custom-blocks' ) },
		{ value: 'android', label: __( 'Android (mobile)', 'wp-custom-blocks' ) },
		{ value: 'ios',     label: __( 'IOS (mobile)', 'wp-custom-blocks' ) },
	];

	const blockProps = useBlockProps( {
		className: (
			device && device !== 'all'
				? device.map((d) => `device-${d}`).join(' ')
				: '' ) + ' dynamic-content'
	} );

	return (
		<>
			<InspectorControls key="setting">
				<PanelBody
					title={ __( 'Options', 'wp-custom-blocks' ) }
					initialOpen={ true }
				>
					<SelectControl
						multiple
						size={ 6 }
						label={ __( 'Display on:', 'wp-custom-blocks' ) }
						value={ device }
						options={ options }
						onChange={ (device) => setAttributes({ device }) }
					/>
				</PanelBody>
			</InspectorControls>

			<div { ...blockProps }>
				<InnerBlocks />
			</div>
		</>
	);
}
