<?php
namespace ChromeDevtoolsProtocol\Domain;

use ChromeDevtoolsProtocol\ContextInterface;
use ChromeDevtoolsProtocol\InternalClientInterface;
use ChromeDevtoolsProtocol\Model\Emulation\CanEmulateResponse;
use ChromeDevtoolsProtocol\Model\Emulation\SetCPUThrottlingRateRequest;
use ChromeDevtoolsProtocol\Model\Emulation\SetDefaultBackgroundColorOverrideRequest;
use ChromeDevtoolsProtocol\Model\Emulation\SetDeviceMetricsOverrideRequest;
use ChromeDevtoolsProtocol\Model\Emulation\SetEmitTouchEventsForMouseRequest;
use ChromeDevtoolsProtocol\Model\Emulation\SetEmulatedMediaRequest;
use ChromeDevtoolsProtocol\Model\Emulation\SetGeolocationOverrideRequest;
use ChromeDevtoolsProtocol\Model\Emulation\SetNavigatorOverridesRequest;
use ChromeDevtoolsProtocol\Model\Emulation\SetPageScaleFactorRequest;
use ChromeDevtoolsProtocol\Model\Emulation\SetScriptExecutionDisabledRequest;
use ChromeDevtoolsProtocol\Model\Emulation\SetTouchEmulationEnabledRequest;
use ChromeDevtoolsProtocol\Model\Emulation\SetVirtualTimePolicyRequest;
use ChromeDevtoolsProtocol\Model\Emulation\SetVirtualTimePolicyResponse;
use ChromeDevtoolsProtocol\Model\Emulation\SetVisibleSizeRequest;
use ChromeDevtoolsProtocol\Model\Emulation\VirtualTimeAdvancedEvent;
use ChromeDevtoolsProtocol\Model\Emulation\VirtualTimeBudgetExpiredEvent;
use ChromeDevtoolsProtocol\Model\Emulation\VirtualTimePausedEvent;
use ChromeDevtoolsProtocol\SubscriptionInterface;

class EmulationDomain implements EmulationDomainInterface
{
	/** @var InternalClientInterface */
	public $internalClient;


	public function __construct(InternalClientInterface $internalClient)
	{
		$this->internalClient = $internalClient;
	}


	public function canEmulate(ContextInterface $ctx): CanEmulateResponse
	{
		$request = new \stdClass();
		$response = $this->internalClient->executeCommand($ctx, 'Emulation.canEmulate', $request);
		return CanEmulateResponse::fromJson($response);
	}


	public function clearDeviceMetricsOverride(ContextInterface $ctx): void
	{
		$request = new \stdClass();
		$this->internalClient->executeCommand($ctx, 'Emulation.clearDeviceMetricsOverride', $request);
	}


	public function clearGeolocationOverride(ContextInterface $ctx): void
	{
		$request = new \stdClass();
		$this->internalClient->executeCommand($ctx, 'Emulation.clearGeolocationOverride', $request);
	}


	public function resetPageScaleFactor(ContextInterface $ctx): void
	{
		$request = new \stdClass();
		$this->internalClient->executeCommand($ctx, 'Emulation.resetPageScaleFactor', $request);
	}


	public function setCPUThrottlingRate(ContextInterface $ctx, SetCPUThrottlingRateRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Emulation.setCPUThrottlingRate', $request);
	}


	public function setDefaultBackgroundColorOverride(ContextInterface $ctx, SetDefaultBackgroundColorOverrideRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Emulation.setDefaultBackgroundColorOverride', $request);
	}


	public function setDeviceMetricsOverride(ContextInterface $ctx, SetDeviceMetricsOverrideRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Emulation.setDeviceMetricsOverride', $request);
	}


	public function setEmitTouchEventsForMouse(ContextInterface $ctx, SetEmitTouchEventsForMouseRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Emulation.setEmitTouchEventsForMouse', $request);
	}


	public function setEmulatedMedia(ContextInterface $ctx, SetEmulatedMediaRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Emulation.setEmulatedMedia', $request);
	}


	public function setGeolocationOverride(ContextInterface $ctx, SetGeolocationOverrideRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Emulation.setGeolocationOverride', $request);
	}


	public function setNavigatorOverrides(ContextInterface $ctx, SetNavigatorOverridesRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Emulation.setNavigatorOverrides', $request);
	}


	public function setPageScaleFactor(ContextInterface $ctx, SetPageScaleFactorRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Emulation.setPageScaleFactor', $request);
	}


	public function setScriptExecutionDisabled(ContextInterface $ctx, SetScriptExecutionDisabledRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Emulation.setScriptExecutionDisabled', $request);
	}


	public function setTouchEmulationEnabled(ContextInterface $ctx, SetTouchEmulationEnabledRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Emulation.setTouchEmulationEnabled', $request);
	}


	public function setVirtualTimePolicy(ContextInterface $ctx, SetVirtualTimePolicyRequest $request): SetVirtualTimePolicyResponse
	{
		$response = $this->internalClient->executeCommand($ctx, 'Emulation.setVirtualTimePolicy', $request);
		return SetVirtualTimePolicyResponse::fromJson($response);
	}


	public function setVisibleSize(ContextInterface $ctx, SetVisibleSizeRequest $request): void
	{
		$this->internalClient->executeCommand($ctx, 'Emulation.setVisibleSize', $request);
	}


	public function addVirtualTimeAdvancedListener(callable $listener): SubscriptionInterface
	{
		return $this->internalClient->addListener('Emulation.virtualTimeAdvanced', function ($event) use ($listener) {
			return $listener(VirtualTimeAdvancedEvent::fromJson($event));
		});
	}


	public function awaitVirtualTimeAdvanced(ContextInterface $ctx): VirtualTimeAdvancedEvent
	{
		return VirtualTimeAdvancedEvent::fromJson($this->internalClient->awaitEvent($ctx, 'Emulation.virtualTimeAdvanced'));
	}


	public function addVirtualTimeBudgetExpiredListener(callable $listener): SubscriptionInterface
	{
		return $this->internalClient->addListener('Emulation.virtualTimeBudgetExpired', function ($event) use ($listener) {
			return $listener(VirtualTimeBudgetExpiredEvent::fromJson($event));
		});
	}


	public function awaitVirtualTimeBudgetExpired(ContextInterface $ctx): VirtualTimeBudgetExpiredEvent
	{
		return VirtualTimeBudgetExpiredEvent::fromJson($this->internalClient->awaitEvent($ctx, 'Emulation.virtualTimeBudgetExpired'));
	}


	public function addVirtualTimePausedListener(callable $listener): SubscriptionInterface
	{
		return $this->internalClient->addListener('Emulation.virtualTimePaused', function ($event) use ($listener) {
			return $listener(VirtualTimePausedEvent::fromJson($event));
		});
	}


	public function awaitVirtualTimePaused(ContextInterface $ctx): VirtualTimePausedEvent
	{
		return VirtualTimePausedEvent::fromJson($this->internalClient->awaitEvent($ctx, 'Emulation.virtualTimePaused'));
	}
}
