<?php
namespace ChromeDevtoolsProtocol\Domain;

use ChromeDevtoolsProtocol\ContextInterface;
use ChromeDevtoolsProtocol\Model\Browser\GetBrowserCommandLineResponse;
use ChromeDevtoolsProtocol\Model\Browser\GetHistogramRequest;
use ChromeDevtoolsProtocol\Model\Browser\GetHistogramResponse;
use ChromeDevtoolsProtocol\Model\Browser\GetHistogramsRequest;
use ChromeDevtoolsProtocol\Model\Browser\GetHistogramsResponse;
use ChromeDevtoolsProtocol\Model\Browser\GetVersionResponse;
use ChromeDevtoolsProtocol\Model\Browser\GetWindowBoundsRequest;
use ChromeDevtoolsProtocol\Model\Browser\GetWindowBoundsResponse;
use ChromeDevtoolsProtocol\Model\Browser\GetWindowForTargetRequest;
use ChromeDevtoolsProtocol\Model\Browser\GetWindowForTargetResponse;
use ChromeDevtoolsProtocol\Model\Browser\SetWindowBoundsRequest;

/**
 * The Browser domain defines methods and events for browser managing.
 *
 * @generated This file has been auto-generated, do not edit.
 *
 * @author Jakub Kulhan <jakub.kulhan@gmail.com>
 */
interface BrowserDomainInterface
{
	/**
	 * Close browser gracefully.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return void
	 */
	public function close(ContextInterface $ctx): void;


	/**
	 * Returns the command line switches for the browser process if, and only if --enable-automation is on the commandline.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return GetBrowserCommandLineResponse
	 */
	public function getBrowserCommandLine(ContextInterface $ctx): GetBrowserCommandLineResponse;


	/**
	 * Get a Chrome histogram by name.
	 *
	 * @param ContextInterface $ctx
	 * @param GetHistogramRequest $request
	 *
	 * @return GetHistogramResponse
	 */
	public function getHistogram(ContextInterface $ctx, GetHistogramRequest $request): GetHistogramResponse;


	/**
	 * Get Chrome histograms.
	 *
	 * @param ContextInterface $ctx
	 * @param GetHistogramsRequest $request
	 *
	 * @return GetHistogramsResponse
	 */
	public function getHistograms(ContextInterface $ctx, GetHistogramsRequest $request): GetHistogramsResponse;


	/**
	 * Returns version information.
	 *
	 * @param ContextInterface $ctx
	 *
	 * @return GetVersionResponse
	 */
	public function getVersion(ContextInterface $ctx): GetVersionResponse;


	/**
	 * Get position and size of the browser window.
	 *
	 * @param ContextInterface $ctx
	 * @param GetWindowBoundsRequest $request
	 *
	 * @return GetWindowBoundsResponse
	 */
	public function getWindowBounds(ContextInterface $ctx, GetWindowBoundsRequest $request): GetWindowBoundsResponse;


	/**
	 * Get the browser window that contains the devtools target.
	 *
	 * @param ContextInterface $ctx
	 * @param GetWindowForTargetRequest $request
	 *
	 * @return GetWindowForTargetResponse
	 */
	public function getWindowForTarget(ContextInterface $ctx, GetWindowForTargetRequest $request): GetWindowForTargetResponse;


	/**
	 * Set position and/or size of the browser window.
	 *
	 * @param ContextInterface $ctx
	 * @param SetWindowBoundsRequest $request
	 *
	 * @return void
	 */
	public function setWindowBounds(ContextInterface $ctx, SetWindowBoundsRequest $request): void;
}
