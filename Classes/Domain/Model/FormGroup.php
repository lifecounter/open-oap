<?php

declare(strict_types=1);

namespace OpenOAP\OpenOap\Domain\Model;

/**
 * This file is part of the "Open Application Platform" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2021 Thorsten Born <thorsten.born@cosmoblonde.de>, cosmoblonde gmbh
 */

/**
 * Fragen-Gruppe
 */
class FormGroup extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{
    /**
     * Name of group
     *
     * @var string
     */
    #[\TYPO3\CMS\Extbase\Annotation\Validate(['validator' => 'NotEmpty'])]
    protected $title = '';

    /**
     * internal title for TYPO3 backend view (for editors)
     *
     * @var string
     */
    protected $internalTitle = '';

    /**
     * introText
     *
     * @var string
     */
    protected $introText = '';

    /**
     * helpText
     *
     * @var string
     */
    protected $helpText = '';

    /**
     * type
     *
     * @var int
     */
    protected $type = 0;

    /**
     * internalUse for repeating
     *
     * @var string
     */
    protected $modelName = '';

    /**
     * @var int
     */
    protected int $displayType = 0;

    /**
     * 0: optional
     * 1: only one item
     * 2... how often these group is fixed
     *
     * @var int
     */
    protected $repeatableMin = 1;

    /**
     * 0: optional
     * 1: only one item
     * 2... how often these group can be added
     *
     * @var int
     */
    protected $repeatableMax = 1;

    /**
     * items
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OpenOAP\OpenOap\Domain\Model\FormItem>
     */
    protected $items;

    /**
     * groupTitle
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OpenOAP\OpenOap\Domain\Model\GroupTitle>
     */
    protected $groupTitle;

    /**
     * itemGroups
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OpenOAP\OpenOap\Domain\Model\FormGroup>
     */
    protected $itemGroups;

    /**
     * modificators
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OpenOAP\OpenOap\Domain\Model\FormModificator>
     */
    protected $modificators = null;

    /**
     * __construct
     */
    public function __construct()
    {
        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     */
    public function initializeObject(): void
    {
        $this->items = $this->items ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->groupTitle = $this->groupTitle ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $this->modificators = $this->modificators ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the title
     *
     * @return string title
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the title
     *
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * Returns the introText
     *
     * @return string introText
     */
    public function getIntroText()
    {
        return $this->introText;
    }

    /**
     * Sets the introText
     *
     * @param string $introText
     */
    public function setIntroText(string $introText): void
    {
        $this->introText = $introText;
    }

    /**
     * Returns the helpText
     *
     * @return string helpText
     */
    public function getHelpText()
    {
        return $this->helpText;
    }

    /**
     * Sets the helpText
     *
     * @param string $helpText
     */
    public function setHelpText(string $helpText): void
    {
        $this->helpText = $helpText;
    }

    /**
     * Returns the modelName
     *
     * @return string modelName
     */
    public function getModelName()
    {
        return $this->modelName;
    }

    /**
     * @return int
     */
    public function getRepeatableMin(): int
    {
        return $this->repeatableMin;
    }

    /**
     * @param int $repeatableMin
     */
    public function setRepeatableMin(int $repeatableMin): void
    {
        $this->repeatableMin = $repeatableMin;
    }

    /**
     * Sets the modelName
     *
     * @param string $modelName
     */
    public function setModelName(string $modelName): void
    {
        $this->modelName = $modelName;
    }

    /**
     * Returns the repeatableMax
     *
     * @return int repeatableMax
     */
    public function getRepeatableMax()
    {
        return $this->repeatableMax;
    }

    /**
     * Sets the repeatableMax
     *
     * @param int $repeatableMax
     */
    public function setRepeatableMax(int $repeatableMax): void
    {
        $this->repeatableMax = $repeatableMax;
    }

    /**
     * Adds a FormItem
     *
     * @param \OpenOAP\OpenOap\Domain\Model\FormItem $item
     */
    public function addItem(\OpenOAP\OpenOap\Domain\Model\FormItem $item): void
    {
        $this->items->attach($item);
    }

    /**
     * Removes a FormItem
     *
     * @param \OpenOAP\OpenOap\Domain\Model\FormItem $itemToRemove The FormItem to be removed
     */
    public function removeItem(\OpenOAP\OpenOap\Domain\Model\FormItem $itemToRemove): void
    {
        $this->items->detach($itemToRemove);
    }

    /**
     * Returns the items
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OpenOAP\OpenOap\Domain\Model\FormItem> items
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Sets the items
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OpenOAP\OpenOap\Domain\Model\FormItem> $items
     */
    public function setItems(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $items): void
    {
        $this->items = $items;
    }

    /**
     * Adds a GroupTitle
     *
     * @param \OpenOAP\OpenOap\Domain\Model\GroupTitle $groupTitle
     */
    public function addGroupTitle(\OpenOAP\OpenOap\Domain\Model\GroupTitle $groupTitle): void
    {
        $this->groupTitle->attach($groupTitle);
    }

    /**
     * Removes a GroupTitle
     *
     * @param \OpenOAP\OpenOap\Domain\Model\GroupTitle $groupTitleToRemove The GroupTitle to be removed
     */
    public function removeGroupTitle(\OpenOAP\OpenOap\Domain\Model\GroupTitle $groupTitleToRemove): void
    {
        $this->groupTitle->detach($groupTitleToRemove);
    }

    /**
     * Returns the groupTitle
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OpenOAP\OpenOap\Domain\Model\GroupTitle> $groupTitle
     */
    public function getGroupTitle()
    {
        return $this->groupTitle;
    }

    /**
     * Sets the groupTitle
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OpenOAP\OpenOap\Domain\Model\GroupTitle> $groupTitle
     */
    public function setGroupTitle(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $groupTitle): void
    {
        $this->groupTitle = $groupTitle;
    }

    /**
     * @return int
     */
    public function getDisplayType(): int
    {
        return $this->displayType;
    }

    /**
     * @param int $displayType
     */
    public function setDisplayType(int $displayType): void
    {
        $this->displayType = $displayType;
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @param int $type
     */
    public function setType(int $type): void
    {
        $this->type = $type;
    }

    /**
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage
     */
    public function getItemGroups(): \TYPO3\CMS\Extbase\Persistence\ObjectStorage
    {
        return $this->itemGroups;
    }

    /**
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage $itemGroups
     */
    public function setItemGroups(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $itemGroups): void
    {
        $this->itemGroups = $itemGroups;
    }

    public function getInternalTitle(): string
    {
        return $this->internalTitle;
    }

    public function setInternalTitle(string $internalTitle): void
    {
        $this->internalTitle = $internalTitle;
    }

    /**
     * Adds a FormModificator
     *
     * @param \OpenOAP\OpenOap\Domain\Model\FormModificator $modificator
     */
    public function addModificator(\OpenOAP\OpenOap\Domain\Model\FormModificator $modificator): void
    {
        $this->modificators->attach($modificator);
    }

    /**
     * Removes a FormModificator
     *
     * @param \OpenOAP\OpenOap\Domain\Model\FormModificator $modificatorToRemove The FormModificator to be removed
     */
    public function removeModificator(\OpenOAP\OpenOap\Domain\Model\FormModificator $modificatorToRemove): void
    {
        $this->modificators->detach($modificatorToRemove);
    }

    /**
     * Returns the modificators
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OpenOAP\OpenOap\Domain\Model\FormModificator> modificators
     */
    public function getModificators()
    {
        return $this->modificators;
    }

    /**
     * Sets the modificators
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\OpenOAP\OpenOap\Domain\Model\FormModificator> $modificators
     */
    public function setModificators(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $modificators): void
    {
        $this->modificators = $modificators;
    }
}
